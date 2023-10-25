var canvas = document.getElementsByTagName("canvas")[0];
const scoreLbl = document.getElementById("score");
const linesLbl = document.getElementById("lines");
var ctx = canvas.getContext("2d");

const BLOCK_SIZE = 28;
const FIELD_WIDTH = 10;
const FIELD_HEIGHT = 20;

canvas.style.top = BLOCK_SIZE;
canvas.style.left = BLOCK_SIZE;

ctx.canvas.width = FIELD_WIDTH * BLOCK_SIZE;
ctx.canvas.height = FIELD_HEIGHT * BLOCK_SIZE;

var W = ctx.canvas.width,
  H = ctx.canvas.height;

var BLOCK_W = W / COLS,
  BLOCK_H = H / ROWS;

function setBlocks() {
  BLOCK_W = W / COLS;
  BLOCK_H = H / ROWS;
}

const scale = BLOCK_SIZE / 13.83333333333;
background.style.width = scale * 166;
background.style.height = scale * 304;

const middle = Math.floor(FIELD_WIDTH / 2);

// draw a single square at (x, y)
function drawBlock(x, y) {
  ctx.fillRect(BLOCK_W * x, BLOCK_H * y, BLOCK_W - 1, BLOCK_H - 1);
  ctx.strokeRect(BLOCK_W * x, BLOCK_H * y, BLOCK_W - 1, BLOCK_H - 1);
}

// draws the board and the moving shape
function render() {
  ctx.clearRect(0, 0, W, H);

  ctx.strokeStyle = "black";
  for (var x = 0; x < COLS; ++x) {
    for (var y = 0; y < ROWS; ++y) {
      if (board[y][x]) {
        ctx.fillStyle = colors[board[y][x] - 1];
        drawBlock(x, y);
      }
    }
  }

  ctx.fillStyle = "red";
  ctx.strokeStyle = "black";
  for (var y = 0; y < 4; ++y) {
    for (var x = 0; x < 4; ++x) {
      if (current[y][x]) {
        ctx.fillStyle = colors[current[y][x] - 1];
        drawBlock(currentX + x, currentY + y);
      }
    }
  }
}
