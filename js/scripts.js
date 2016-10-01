jQuery(function($) {

    $('.dev-order-input').focus(function() {
        $(this).parent().addClass('is-focused has-label');
    })

    $('.dev-order-input').blur(function() {
        $parent = $(this).parent();
        if ($(this).val() == "") {
            $parent.removeClass('is-focused has-label');
        }
        $parent.removeClass('is-focused');
    })



    $('.dev-footer-input').focus(function() {
        $(this).parent().addClass('is-focused has-label');
    })

    $('.dev-footer-input').blur(function() {
        $parent = $(this).parent();
        if ($(this).val() == "") {
            $parent.removeClass('is-focused has-label');
        }
        $parent.removeClass('is-focused');
    });

    var ent = ["cement", "crushedStone", "sand", "water"];

    ent.forEach(function(item, i) {
        var doughnutData = [];
        var container = "";
        if (item == "cement") {
            container = item;
            doughnutData = [{
                value: 20,
                color: "#757575"
            }, {
                value: 80,
                color: "#bdbdbd"
            }, ];
        } else if (item == "crushedStone") {
            container = item;
            var doughnutData = [{
                value: 100,
                color: "#757575"
            }, {
                value: 0,
                color: "#bdbdbd"
            }, ];
        } else if (item == "sand") {
            container = item;
            var doughnutData = [{
                value: 80,
                color: "#757575"
            }, {
                value: 20,
                color: "#bdbdbd"
            }, ];
        } else if (item == "water") {
            container = item;
            var doughnutData = [{
                value: 20,
                color: "#757575"
            }, {
                value: 80,
                color: "#bdbdbd"
            }, ];

        }
        var countries = document.getElementById(container).getContext("2d");
        var doughnutOptions = {
            segmentShowStroke: true,
            animateScale: true,
        };
        new Chart(countries).Doughnut(doughnutData, doughnutOptions);
    });
});