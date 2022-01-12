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
            html += '<div class="row">';
            for (let i = 0; i < data[0].length; i++) {

                html += '<div class="col-12 col-sm-12 col-md-6 col-lg-4"> ' +
                    '<div class="card bands-col">' +
                    '<div class="card-body">';
                if (counter == 0 && data[1]) {
                    html += '<div class="plus">' +
                        '<a class="addIcon" href="?c=band&a=bandForm"><i class="fas fa-plus-circle"></i></a>' +
                        '</div>';
                    i--;
                } else {
                    let band = data[0][i];
                    html += '<div class="cardIcons">';
                    if (data[1]) {
                        html += '<div class="row"> ' +
                            '<div class="col-12 col-sm-6 col-md-6 col-lg-6 cog-b">' +
                            '<a href="?c=band&a=modifyForm&id=' + band['id'] + '"><i ' +
                            'class="fas fa-cog" ></i></a>' +
                            '</div>' +
                            '<div class="col-12 col-sm-6 col-md-6 col-lg-6 minus-b">' +
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

                counter++;
            }
            html += '</div>';
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