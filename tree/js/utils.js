String.prototype.format = function(q) {
	var args = arguments;
	return this.replace(/{(\d+)}/g, function(match, number) {
		return typeof args[number] !== 'undefined' ? args[number] : match
	})
};

Number.prototype.toHalf = function() {
	var n = Math.floor(this * 2);
	n = n % 2 ? n : n + 1;
	return n / 2;
};

Number.prototype.range = function(from, to) {
	var range = [];
	for (var i = from; i <= to; i++) range.push(i);
	return range;
};

$.fn.getContext = function() {
	var ctx = this.get(0);
	window.G_vmlCanvasManager && G_vmlCanvasManager.initElement(ctx);
	return ctx.getContext('2d');
};