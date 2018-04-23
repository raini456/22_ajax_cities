(function () {
//    var btns = [];
//    var output = '';
//    btns = document.querySelectorAll('button');
//    output = document.querySelector('#output');
//    for (var i = 0; i < btns.length; i++) {
//        btns[i].addEventListener('click', ajax);
//    }
//    ajax('post', 'data.php', btns[i] , fx);
//    function fx(res) {
//        console.log(res);
//    }
    ajax('post', 'data.php', {city: 'Phuket'}, function (r) {
        console.log(r);
    });
})();