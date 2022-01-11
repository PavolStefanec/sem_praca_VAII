// let navLinks = document.getElementById("navLinks");
//
// function showNav(){
//     // navLinks.style.right = "0";
//     navLinks.style.visibility = "visible";
// }
// function hideNav(){
//     // navLinks.style.right = "-200px";
//     navLinks.style.visibility = "hidden";
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

                html += '<div class="col-12 col-sm-12 col-md-6 col-lg-4"> ' +
                    '<div class="card bands-col">' +
                    '<div class="card-body">';
                if (counter == 0 && data[1]) {
                    html += '<div class="plus-b">' +
                        '<a class="addIcon" href="?c=band&a=bandForm"><i class="fas fa-plus-circle"></i></a>' +
                        '</div>';
                    i--;
                } else {
                    let band = data[0][i];
                    html += '<div class="cardIcons">';
                    if (data[1]) {
                        html += '<div class="row"> ' +
                            '<div class="col-2 col-sm-2 col-md-2 col-lg-2 cog">' +
                            '<a href="?c=band&a=modifyForm&id=' + band['id'] + '"><i ' +
                            'class="fas fa-cog" ></i></a>' +
                            '</div>' +
                            '<div class="col-2 col-sm-6 col-md-6 col-lg-2 minus">' +
                            '<i class="fas fa-minus-circle" onclick="deleteBand(' + band['id'] + ')"></i>' +
                            '</div> </div>';
                    }
                    html += '</div>'
                    html += '<img src="public/files/' + band['logo_src'] + '" ' +
                        'class="img-fluid mx-auto d-block" alt="band1">' +
                        '<a class="nav-link" href="?c=band&a=bandPage&id=' + band['id'] + '"><p>' +
                        band['name'] + '</p></a>';
                }
                html += '</div> </div> </div>';

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