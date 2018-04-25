// JavaScript Document

function fadeOut(id, time) {
	target = document.getElementById(id);
	alpha = 100;
	timer = (time*1000)/50;
	var i = setInterval(
			function() {
				if (alpha <= 0)
					clearInterval(i);
				setAlpha(target, alpha);
				alpha -= 2;
			}, timer);
}

function fadeIn(id, time) {
	target = document.getElementById(id);
	alpha = 0;
	timer = (time*1000)/50;
	var i = setInterval(
			function() {
				if (alpha >= 100)
					clearInterval(i);
				setAlpha(target, alpha);
				alpha += 2;
			}, timer);
}

function setAlpha(target, alpha) {
	target.style.filter = "alpha(opacity="+ alpha +")";
	target.style.opacity = alpha/100;
}
