$(document).ready(function() {

  var $levels = $(".level"),
    numOfLevels = $levels.length,
    curLevel = 1,
    $curLevel = $(".level.active"),
    $levelPagi = $(".level-pagi"),
    $elems = $curLevel.find(".elem"),
    numOfPages = $elems.length,
    curPage = 1,
    $rotater = $curLevel.find(".rotater"),
    stepAngle = 360 / numOfPages,
    $botPagi = $(".nav-bot__pagi"),
    $navBot = $(".nav-bot"),
    SCENEPERS = 200,
    MULTI_Z = 13,
    LEVELANIM = 1000,
    SIDEANIM = 500,
    animating = false;

  function placeElems() {
    $levels.each(function() {
      var $elems = $(this).find(".elem"),
        len = $elems.length,
        angle = 360 / len,
        ELEM_Z = len * MULTI_Z;

      $(this).attr("data-elemZ", ELEM_Z);
      $elems.each(function(i) {
        $(this).css("transform", "rotateY(" + (0 - i * angle) + "deg) translateZ(" + (0 - ELEM_Z) + "vw)");
      });
    });
  }

  placeElems();

  function recreateBottomNav() {
    $(".nav-bot__pagi").remove();
    var newPagi = [];
    for (var i = 1; i <= numOfPages; i++) {
      var $botPagiEl = $("<span class='nav-bot__pagi' data-page='" + i + "'></span>"),
        activeEl = +$curLevel.attr("data-curpage") || 1;
      if (i === activeEl) $botPagiEl.addClass("active");
      newPagi.push($botPagiEl);
    }
    $(".nav-bot__btn.left").after(newPagi);
    $botPagi = $(".nav-bot__pagi");
  }

  function redefineVars() {
    $curLevel = $(".level.active");
    $elems = $curLevel.find(".elem");
    numOfPages = $elems.length;
    curPage = $curLevel.find(".elem.active").index() + 1 || 1;
    $rotater = $curLevel.find(".rotater");
    stepAngle = 360 / numOfPages;
  }
/*
  function changeLevel() {
    $(".level").removeClass("active");
    $(".level-" + curLevel).addClass("active");
    $navBot.addClass("inactive");

    animating = true;

    setTimeout(function() {
      redefineVars();
      recreateBottomNav();

      $levels.css("transform", "translate3d(0," + (0 - (curLevel - 1) * 150) + "%,0)");
      $levelPagi.css("transform", "translate3d(0," + (0 - (curLevel - 1) * 100) + "%,0)");

      setTimeout(function() {
        $navBot.removeClass("inactive");
      }, 600);

    }, 200);

    setTimeout(function() {
      animating = false;
    }, LEVELANIM);
  }
*/
  function navigateUp() {
    if (curLevel > 1) {
      curLevel--;
      changeLevel();
    }
  }

  function navigateDown() {
    if (curLevel < numOfLevels) {
      curLevel++;
      changeLevel();
    }
  }

  function sideNavigation(directPage) {
    if (directPage) {
      var diff = Math.abs(directPage - curPage),
        dirRight = directPage > curPage,
        curAngle = +$rotater.attr("data-angle") || 0;
      if (dirRight && diff > numOfPages / 2) {
        dirRight = false;
        diff = numOfPages - diff;
      } else if (!dirRight && diff > numOfPages / 2) {
        dirRight = true;
        diff = numOfPages - diff;
      }
      var nextAngle = (dirRight) ? curAngle + stepAngle * diff : curAngle - stepAngle * diff;
      curPage = directPage;
      $rotater.attr("data-angle", nextAngle).css("transform", "rotateY(" + nextAngle + "deg)");
    }
    $elems.removeClass("active");
    $elems.eq(curPage - 1).addClass("active");
    $botPagi.removeClass("active");
    $botPagi.eq(curPage - 1).addClass("active");
    $curLevel.attr("data-curpage", curPage);
    animating = true;
    setTimeout(function() {
      animating = false;
    }, SIDEANIM);
  }

  function navigateLeft() {
    var curAngle = +$rotater.attr("data-angle") || 0,
      nextAngle = curAngle - stepAngle;
    $rotater.attr("data-angle", nextAngle).css("transform", "rotateY(" + nextAngle + "deg)");
    (curPage > 1) ? curPage-- : curPage = numOfPages;
    sideNavigation();
  }

  function navigateRight() {
    var curAngle = +$rotater.attr("data-angle") || 0,
      nextAngle = curAngle + stepAngle;
    $rotater.attr("data-angle", nextAngle).css("transform", "rotateY(" + nextAngle + "deg)");
    (curPage < numOfPages) ? curPage++ : curPage = 1;
    sideNavigation();
  }

  var winW = $(window).width(),
    winH = $(window).height(),
    pathD,
    pathDCopy,
    bigArr = [],
    path,
    rndArr,
    $pickedElem,
    pickedZ;

  function range(n) {
    return Array.apply(null, {
      length: n
    }).map(Number.call, Number)
  }
/*
  function createSvg($el, points) {
    var $el = $el,
      points = points,
      bgColor = $el.css("background-color"),
      elW = $el.width(),
      elH = $el.height(),
      minW = (winW - elW) / 2,
      maxW = winW - minW,
      minH = (winH - elH) / 2,
      maxH = (winH - minH),
      pps = Math.round(points / 4), // POINTS PER SIDE
      stepW = elW / pps,
      stepH = elH / pps,
      bigStepW = winW / pps,
      bigStepH = winH / pps,
      arr = [],
      $svg = $("<svg class='svg-matter'><path fill='" + bgColor + "' /></svg>");

    rndArr = range(pps * 4);

    if (pps > 1) {
      for (var i = 0; i < pps; i++) {
        arr[i] = (minW + stepW * i) + "," + minH;
        bigArr[i] = (bigStepW * i) + ",0";
        arr[i + pps] = maxW + "," + (minH + stepH * i);
        bigArr[i + pps] = winW + "," + (bigStepH * i);
        arr[i + pps * 2] = (maxW - stepW * i) + "," + maxH;
        bigArr[i + pps * 2] = (winW - bigStepW * i) + "," + winH;
        arr[i + pps * 3] = minW + "," + (maxH - stepH * i);
        bigArr[i + pps * 3] = "0," + (winH - bigStepH * i);
      }
    }

    arr[0] = "M" + arr[0];
    bigArr[0] = "M" + bigArr[0];
    pathDCopy = arr;
    pathD = arr.join(" ");
    $svg.find("path").attr("d", pathD);
    $("body").append($svg);
    return $svg;
  }
*/
  function newD(points, p) {
    var arr = points.split(" ");
    arr[p] = bigArr[p];
    return arr.join(" ");
  }

  function animateLoop(elem, len, justAnimate) {
    var length = $(elem).attr("d").split(" ").length,
      len = len,
      ast = 8,
      dur = 100,
      duration = Math.floor(Math.random() * dur + dur / 2),
      atSameTime = Math.floor(len / ast) || 8;
    if (rndArr.length) {
      while (atSameTime--) {
        var num = rndArr.splice(Math.floor(Math.random() * rndArr.length), 1)[0];
        pathD = newD(pathD, num);
      }
      Snap(elem).animate({
        'path': pathD
      }, duration, mina.easeinout, function() {
        animateLoop(elem, len, justAnimate)
      });
    } else {
      if (justAnimate) {
        $(".svg-matter").remove();
        $(".inner").removeClass("clicked");
        activateHandlers();
        animating = false;
        return;
      }
      $pickedElem.find(".art-content").addClass("visible");
      $pickedElem.addClass("instant-transition");
      $pickedElem.find(".inner").addClass("instant-transition");
      $pickedElem.css("top");
      $pickedElem.find(".inner").css("transform", "translateZ(" + pickedZ + "vw)")
      bigArr = pathDCopy;
      $(".scene").addClass("content-visible");
      $pickedElem.addClass("content-visible full-screen");
    }
  }
/*
  function elemClick() {
    if (animating) return;
    var $inner = $(this).parent(),
      $elem = $inner.parent(),
      bgColor = $inner.css("background-color"),
      innerZDiff = 15,
      z = +$elem.parents(".level.active").attr("data-elemz"),
      coef = SCENEPERS / (SCENEPERS + z - innerZDiff),
      w = Math.ceil($elem.width() * coef) + 1,
      h = Math.ceil($elem.height() * coef),
      left = ($elem.width() - w) / 2 + $(window).width() / 10,
      top = ($elem.height() - h) / 2;

    animating = true;
    removeHandlers();
    $pickedElem = $elem;
    pickedZ = z;

    var $div = $("<div></div>");
    $div.css({
      "position": "absolute",
      "width": w,
      "height": h,
      "background": bgColor,
      "z-index": 15,
      "top": top,
      "left": left
    });

    $inner.addClass("clicked");
    setTimeout(function() {
      $curLevel.append($div);
      $div.addClass("shake");
      setTimeout(function() {
        $div.removeClass("shake");
        createSvg($div, 32);
        $div.remove();
        animateLoop(".svg-matter path", 32);
      }, 400);
    }, 300);
  }
	/*)
  $(document).on("click", ".elem:not(.active) .art-btn", function() {
    if (animating) return;
    var that = this;
    setTimeout(function() {
      $(that).trigger("click");
    }, SIDEANIM + 50);
  });

  $(document).on("click", ".elem.active .art-btn", elemClick);
*/
  function activateHandlers() {

    $(document).on("mousewheel DOMMouseScroll", function(e) {
      if (animating) return;
      if (e.originalEvent.wheelDelta > 0 || e.originalEvent.detail < 0) {
        navigateUp();
      } else {
        navigateDown();
      }
    });

    $(document).on("keydown", function(e) {
      if (animating) return;
      if (e.which === 37) {
        navigateLeft();
      } else if (e.which === 38) {
        navigateUp();
      } else if (e.which === 39) {
        navigateRight();
      } else if (e.which === 40) {
        navigateDown();
      }
    });

  }

  activateHandlers();

  function removeHandlers() {
    $(document).off("mousewheel DOMMouseScroll");
    $(document).off("keydown");
  }

  $(document).on("click", ".nav-top__btn", function() {
    if (animating) return;
    if ($(this).hasClass("up")) {
      navigateUp();
    } else {
      navigateDown();
    }
  });

  $(document).on("click", ".nav-bot__btn", function() {
    if (animating) return;
    if ($(this).hasClass("left")) {
      navigateLeft();
    } else {
      navigateRight();
    }
  });

  $(document).on("click", ".nav-bot__pagi:not(.active)", function() {
    if (animating) return;
    sideNavigation(+$(this).attr("data-page"));
  });

  $(document).on("click", ".elem:not(.active)", function() {
    if (animating) return;
    sideNavigation(+$(this).index() + 1);
  });

  $(document).on("click", ".art-close", function() {
    $pickedElem.removeClass("content-visible");
    setTimeout(function() {
      $(".svg-matter").attr("class", "svg-matter above");
      $pickedElem.removeClass("full-screen instant-transition");
      $pickedElem.find(".inner").attr("style", "");
      $pickedElem.find(".art-content").removeClass("visible").removeClass("instant-transition");
      $pickedElem.find(".inner").removeClass("instant-transition");
      $pickedElem.css("top");
      $(".scene").removeClass("content-visible");
      rndArr = range(32);
      animateLoop(".svg-matter path", 32, true);
    }, 300);

  });

  $(window).resize(function() {
    winW = $(window).width();
    winH = $(window).height();
  });

});