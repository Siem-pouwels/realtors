function getHouses() {
    $.ajax({
		type: "GET",
		dataType: "json",
		url: "http://127.0.0.1:8000/api/houses",

		success: function (houses) {
			console.log(houses)
            var template = $("#all-houses-template").html();
			console.log(template)
			var renderTemplate = Mustache.render(template, houses);
            console.log(renderTemplate)
			$("#all-houses").append(renderTemplate);
		}
	});
}


$(document).ready(function () {
	getHouses();
    
});