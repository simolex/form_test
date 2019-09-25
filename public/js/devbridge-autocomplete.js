$(document).ready(function() {
    var countries = {
    "AD": "Andorra",
    "A2": "Andorra Test",
    "AE": "United Arab Emirates",
    "AF": "Afghanistan",
    "AG": "Antigua and Barbuda",
    "AI": "Anguilla",
    "AL": "Albania",
    "AM": "Armenia",
    "AN": "Netherlands Antilles",
    "AO": "Angola",
    "AQ": "Antarctica",
    "AR": "Argentina",
    "AS": "American Samoa",
    "AT": "Austria",
    "AU": "Australia",
    "AW": "Aruba"};

    var countriesArray = $.map(countries, function (value, key) { return { value: value, data: key }; });

    $('.js-user-autocomplete').each(function() {

        var autocompleteUrl = $(this).data('autocomplete-url');

    var that = this;
    $(this).autocomplete({
        serviceUrl: autocompleteUrl,
        paramName: "query",
        //dataType: json,
        transformResult: function(response) {
            return {
                suggestions: $.map(JSON.parse(response), function(dataItem) {
                        return { value: dataItem.email };
                    }),
            };
        },
        //lookup: countriesArray,
        /*onSelect: function(suggestion) {
            that.html('You selected: ' + suggestion.value + ', ' + suggestion.data);
        },*/
        /*onHint: function (hint) {
            $('#autocomplete-ajax-x').val(hint);
        },
        onInvalidateSelection: function() {
            $('#selction-ajax').html('You selected: none');
        }*/
        deferRequestBy:500

    });

        /*$(this).autocomplete({hint: false}, [
            {
                source: function(query, cb) {
                    $.ajax({
                        url: autocompleteUrl//+'?query='+query
                    }).then(function(data) {
                        cb(data.users);
                    });
                },
                displayKey: 'email',
                debounce: 500 // only request every 1/2 second
            }
        ])*/
    });
});