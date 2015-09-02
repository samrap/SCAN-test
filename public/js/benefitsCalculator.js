$(function() {
    var benefitsCalcForm = $('#benefitsCalcForm');

    benefitsCalcForm.submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: 'getbenefits',
            method: 'GET',
            data: benefitsCalcForm.serialize()
        }).done(function(data) {
            var json = JSON.parse(data);
            var ul = $('#benefitsList');
            var benefit;

            ul.empty();
            if (json.invalidZip) {
                $('#benefitsCounty').text(json.invalidZip);
                ul.append('<li>Oops! Looks like you entered an incorrect zip code. Please try again.</li>');

            } else {
                for (var i = 0; i < json.length; i++) {
                    benefit = json[i].benefit.split(/ (.+)?/);
                    ul.append('<li><span class="value">' + benefit[0] + '</span> ' + benefit[1] + '</li>');
                }
                $('#benefitsCounty').text(json[0].county);
            }
        });
    });
});
