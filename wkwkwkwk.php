<?php

$gifs = [
  "https://i.pinimg.com/originals/c0/7f/97/c07f97f3234f1820d0388f1a62377a9a.gif",
  "https://i.pinimg.com/originals/e6/e5/b3/e6e5b3a98ddfc57a6e1b2d45fef4ab3d.gif",
  "https://i.redd.it/go7ir6novo8f1.gif"
];

$img_prank = $gifs[array_rand($gifs)];

$audio = "https://www.myinstants.com/media/sounds/jumpscare.mp3";
?>

<!DOCTYPE html>
<html>

<head>
  <title>Loading...</title>

  <style>
    @keyframes shake {
      0% {
        transform: translate(0, 0);
      }

      25% {
        transform: translate(15px, -15px);
      }

      50% {
        transform: translate(-15px, 15px);
      }

      75% {
        transform: translate(15px, 15px);
      }

      100% {
        transform: translate(0, 0);
      }
    }

    * {
      margin: 0;
      padding: 0;
    }

    body {
      height: 300vh;
    }

    #prankOverlay {
      position: fixed;
      inset: 0;
      background: black;
      display: none;
      justify-content: center;
      align-items: center;
      z-index: 9999999;
    }

    #prankOverlay.active {
      display: flex;
      animation: shake 0.12s infinite;
    }

    #prankOverlay img {
      width: 100vw;
      height: 100vh;
      object-fit: cover;
    }

    .prank-close {
      position: absolute;
      top: 8px;
      right: 8px;
      background: red;
      color: white;
      border: none;
      padding: 8px 14px;
      font-size: 14px;
      cursor: pointer;
      z-index: 10000000;
    }
  </style>
</head>

<body>


  <div id="prankOverlay">
    <img src="<?= $img_prank ?>" />
    <button class="prank-close">✕</button>
    <audio id="jumpsound" src="<?= $audio ?>"></audio>
  </div>

  <script>
    function showPrank() {
      let overlay = document.getElementById("prankOverlay");
      let audio = document.getElementById("jumpsound");

      overlay.classList.add("active");
      audio.volume = 1;
      audio.play();

      document.body.style.overflow = "hidden";

      // AUTO FULLSCREEN
      if (document.documentElement.requestFullscreen) {
        document.documentElement.requestFullscreen();
      }
    }

    function hidePrank() {
      let overlay = document.getElementById("prankOverlay");
      let audio = document.getElementById("jumpsound");

      overlay.classList.remove("active");
      audio.pause();
      audio.currentTime = 0;

      document.body.style.overflow = "";

      if (document.exitFullscreen) {
        document.exitFullscreen();
      }
    }

    // Delay jumpscare
    setTimeout(showPrank, 1200);

    // Klik close
    document.querySelector(".prank-close").onclick = hidePrank;

    // ESC close
    document.addEventListener("keydown", function (e) {
      if (e.key === "Escape") hidePrank();
    });

    // Klik luar tutup
    document.getElementById("prankOverlay").onclick = function (e) {
      if (e.target.id === "prankOverlay") hidePrank();
    };

    document.addEventListener('click', function enableSound() {
      let audio = document.getElementById("jumpsound");
      audio.play().then(() => {
        audio.pause();
        audio.currentTime = 0;
        document.removeEventListener('click', enableSound);
      }).catch(() => { });
    });
  </script>

</body>

</html>