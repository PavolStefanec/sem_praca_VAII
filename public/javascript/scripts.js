// let navLinks = document.getElementById("navLinks");
//
// function showNav(){
//     navLinks.style.right = "0";
// }
// function hideNav(){
//     navLinks.style.right = "-200px";
// }





// ------------------------------------------- stuff...

function getAllBands () {
    fetch("?c=band&a=getAllBands")
        .then(response => response.json())
        .then(data => {
            let html = "";
            let counter = 0;
            for (let i = 0; i < data[0].length; i++) {
                if (counter % 3 == 0)
                    html += '<div class="row">';

                html += '<div class="bands-col">';
                if (counter == 0 && data[1]) {
                    html += '<a href="?c=band&a=bandForm"><i class="fas fa-plus-circle"></i></a>';
                    i--;
                } else {
                    let band = data[0][i];
                    html += '<img src="public/files/' + band['logo_src'] + '" ' +
                        'class="img-fluid mx-auto d-block" alt="band1">' +
                        '<a class="nav-link" href="?c=band&a=bandPage&id=' + band['id'] + '"><p>' +
                        band['name'] + '</p></a>';
                    if (data[1]) {
                        html += '<a href="?c=band&a=modifyForm&id=' + band['id'] + '"><i ' +
                            'class="fas fa-cog" ></i></a>' +
                            '<i class="fas fa-minus-circle" onclick="deleteBand(' + band['id'] + ')"></i>';
                    }
                }
                html += '</div>';

                if (counter % 3 == 2) {
                    html += '</div>';
                }
                counter++;
            }
            document.getElementById("content").innerHTML = html;
        });
}

function deleteBand(parId) {
    fetch("?c=band&a=deleteBand", {
        method : 'POST', headers : {
            'Content-Type' : 'application/x-www-form-urlencoded',
        }, body: 'id=' + parId
    }).then(response => {
        getAllBands(); 
    });
}

window.onload = function() {
    getAllBands();
}