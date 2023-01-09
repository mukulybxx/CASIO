// Canvasのデータ取得 //
const c = document.getElementById("kanji");
const ctx = c.getContext("2d");

// 背景描画 //
var image = new Image();
image.src = "./img/elements/canvas5.png";

image.onload = function () {
  ctx.drawImage(image, 0, 0, 400, 400);
};

// ver left = 10;
ctx.lineWidth = 5;

// 描画の開始 //
wStart = function (e) {
  // 画面のスクロールを防止する //
  e.preventDefault();

  // 描画モード //
  w = true;
  ctx.beginPath();
  ctx.lineWidth = 15;

  // スマホ、タブレット以外 //
  if (typeof e.touches == "undefined") {
    ctx.moveTo(e.offsetX, e.offsetY);

    // スマホ、タブレット以外 //
  } else {
    var t = e.touches[0];
    var p = e.target.getBoundingClientRect();

    //描画位置のズレを修正
    ctx.moveTo(t.pageX - p.left, t.pageY - p.top);
  }
};
// マウス押下時 //
c.onmousedown = wStart;
// タッチ開始時 //
c.ontouchstart = wStart;

// ラインを描画 //
wLine = function (e) {
  // 描画モードの時 //
  if (w) {
    // スマホ、タブレット以外 //
    if (typeof e.touches == "undefined") {
      if (e.offsetX >= 390 || e.offsetX <= 5 || e.offsetY >= 390 || e.offsetY <= 5) {
        c.dispatchEvent(new Event('mouseup'));
        return;
      }

      ctx.lineTo(e.offsetX, e.offsetY);

      // スマホ、タブレット以外 //
    } else {
      var t = e.touches[0];
      var p = e.target.getBoundingClientRect();

      // 描画位置のズレを修正
      ctx.lineTo(t.pageX - p.left, t.pageY - p.top);
    }
    ctx.stroke();
  }
};
// マウス移動時 //
c.onmousemove = wLine;
// タッチ移動時 //
c.ontouchmove = wLine;

// 描画の終了 //
var wStop = function () {
  w = false;
  ctx.lineWidth = 5;
  ctx.closePath();
};
// マウスボタンを離した時 //
c.onmouseup = wStop;
// タッチ終了時 //
c.ontouchend = wStop;

// クリアボタン押下時 //
clear.onclick = function () {
  ctx.clearRect(0, 0, c.width, c.height);

  // 背景描画 //
  var image = new Image();
  image.src = "./img/JS0502.png1";

  image.onload = function () {
    ctx.drawImage(image, 0, 0, 400, 400);
  };
};
