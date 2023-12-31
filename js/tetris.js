var COLS = 10,
  ROWS = 20;
var board = [];
var lose;
var interval;
var intervalRender;
var current; // current moving shape
var currentX, currentY; // position of current shape
var freezed; // is current shape settled on the board?
var shapes = [
  [1, 1, 1, 1],
  [1, 1, 1, 0, 1],
  [1, 1, 1, 0, 0, 0, 1],
  [1, 1, 0, 0, 1, 1],
  [1, 1, 0, 0, 0, 1, 1],
  [0, 1, 1, 0, 1, 1],
  [0, 1, 0, 0, 1, 1, 1],
];
var colors = ["cyan", "orange", "blue", "yellow", "red", "green", "purple"];
var velocity = 500;
let mirror = false;

var nivel = 1;

function setBoard(big = false) {
  if (big) {
    COLS = 22;
    ROWS = 44;
  } else {
    COLS = 10;
    ROWS = 20;
  }
  setBlocks();
}

// creates a new 4x4 shape in global variable 'current'
// 4x4 so as to cover the size when the shape is rotated
function newShape() {
  var id = Math.floor(Math.random() * shapes.length);
  var shape = shapes[id]; // maintain id for color filling

  current = [];
  for (var y = 0; y < 4; ++y) {
    current[y] = [];
    for (var x = 0; x < 4; ++x) {
      var i = 4 * y + x;
      if (typeof shape[i] != "undefined" && shape[i]) {
        current[y][x] = id + 1;
      } else {
        current[y][x] = 0;
      }
    }
  }

  // new shape starts to move
  freezed = false;
  // position where the shape will evolve
  currentX = 5;
  currentY = 0;
}

// clears the board
function init() {
  for (var y = 0; y < ROWS; ++y) {
    board[y] = [];
    for (var x = 0; x < COLS; ++x) {
      board[y][x] = 0;
    }
  }
}

// keep the element moving down, creating new shapes and clearing lines
function tick() {
  if (valid(0, 1)) {
    ++currentY;
  }
  // if the element settled
  else {
    freeze();
    valid(0, 1);
    clearLines();
    if (lose) {
      clearAllIntervals();
      return false;
    }
    newShape();
  }
}

// stop shape at its position and fix it to board
function freeze() {
  for (var y = 0; y < 4; ++y) {
    for (var x = 0; x < 4; ++x) {
      if (current[y][x]) {
        board[y + currentY][x + currentX] = current[y][x];
      }
    }
  }
  freezed = true;
}

// returns rotates the rotated shape 'current' perpendicularly anticlockwise
function rotate(current) {
  var newCurrent = [];
  for (var y = 0; y < 4; ++y) {
    newCurrent[y] = [];
    for (var x = 0; x < 4; ++x) {
      newCurrent[y][x] = current[3 - x][y];
    }
  }

  return newCurrent;
}

let score = 0; // Variável de pontuação global
let lines = 0;

function updateScore(linesCleared) {
  score += linesCleared * 10 * linesCleared;
  lines++;

  scoreLbl.innerText = score;
  linesLbl.innerText = lines;
}

function mirrorBoard() {
  for (let y = 0; y < ROWS; ++y) {
    for (let x = 0; x < COLS / 2; ++x) {
      const temp = board[y][x];
      board[y][x] = board[y][COLS - 1 - x];
      board[y][COLS - 1 - x] = temp;
    }
  }

  mirror = !mirror;
}

// check if any lines are filled and clear them
function clearLines() {
  let linesCleared = 0;
  for (let y = ROWS - 1; y >= 0; --y) {
    let rowFilled = true;
    for (let x = 0; x < COLS; ++x) {
      if (board[y][x] == 0) {
        rowFilled = false;
        break;
      }
    }
    if (rowFilled) {
      // Remova a linha
      for (let yy = y; yy > 0; --yy) {
        for (let x = 0; x < COLS; ++x) {
          board[yy][x] = board[yy - 1][x];
        }
      }
      ++y;
      linesCleared++;
    }
  }

  if (linesCleared > 0) {
    updateScore(linesCleared);
    mirrorBoard();

    if (score >= nivel * 300) {
      nivel++;
      clearInterval(interval);
      interval = setInterval(tick, velocity - 75);
    }
  }
}

function keyPress(key) {
  if (mirror) {
    switch (key) {
      case "left":
        if (valid(1)) {
          ++currentX;
        }
        break;
      case "right":
        if (valid(-1)) {
          --currentX;
        }
        break;
      case "down":
        var rotated = rotate(current);
        if (valid(0, 0, rotated)) {
          current = rotated;
        }
        break;
      case "rotate":
        if (valid(0, 1)) {
          ++currentY;
        }
        break;
      case "drop":
        while (valid(0, 1)) {
          ++currentY;
        }
        tick();
        break;
    }
  } else {
    switch (key) {
      case "left":
        if (valid(-1)) {
          --currentX;
        }
        break;
      case "right":
        if (valid(1)) {
          ++currentX;
        }
        break;
      case "down":
        if (valid(0, 1)) {
          ++currentY;
        }
        break;
      case "rotate":
        var rotated = rotate(current);
        if (valid(0, 0, rotated)) {
          current = rotated;
        }
        break;
      case "drop":
        while (valid(0, 1)) {
          ++currentY;
        }
        tick();
        break;
    }
  }
}

// checks if the resulting position of current shape will be feasible
function valid(offsetX, offsetY, newCurrent) {
  offsetX = offsetX || 0;
  offsetY = offsetY || 0;
  offsetX = currentX + offsetX;
  offsetY = currentY + offsetY;
  newCurrent = newCurrent || current;

  for (var y = 0; y < 4; ++y) {
    for (var x = 0; x < 4; ++x) {
      if (newCurrent[y][x]) {
        if (
          typeof board[y + offsetY] == "undefined" ||
          typeof board[y + offsetY][x + offsetX] == "undefined" ||
          board[y + offsetY][x + offsetX] ||
          x + offsetX < 0 ||
          y + offsetY >= ROWS ||
          x + offsetX >= COLS
        ) {
          if (offsetY == 1 && freezed) {
            lose = true; // lose if the current shape is settled at the top most row
            document.getElementById("playbutton").disabled = false;
            stopTimer();
            registerScore();
          }
          return false;
        }
      }
    }
  }
  return true;
}

function registerScore() {
  var formData = {
    score: score,
    date: formatDate(),
    time: $("#timer").val(),
  };

  $.ajax({
    type: "POST",
    url: "../../backend/create_new_score.php",
    dataType: "json",
    data: formData,
    encode: true,
  })
    .done(function (response) {
      if (response.status === "success") {
        Swal.fire({
          title: "Sucesso!",
          text: response.message,
          icon: "success",
        });
      } else {
        Swal.fire({
          title: "Oops!",
          text: response.message,
          icon: "warning",
        });
      }
    })
    .fail(function (error) {
      console.log(error);
      Swal.fire({
        title: "Falha!",
        text: "Tivemos um problema ao se conectar com o servidor",
        icon: "error",
      });
    });
}

function playButtonClicked(big = false) {
  setBoard(big);
  newGame();
  document.getElementById("playbutton").disabled = true;
}

function newGame() {
  clearAllIntervals();
  intervalRender = setInterval(render, 30);
  init();
  newShape();
  lose = false;
  interval = setInterval(tick, velocity);
  startTimer();
}

function clearAllIntervals() {
  clearInterval(interval);
  clearInterval(intervalRender);
}
