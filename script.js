(function(){
    var index = {
        init: function() {
            window.addEventListener('load', function() {  
                var form = document.getElementById('forma');
                form.addEventListener('submit', function(event) {
                    event.preventDefault ? event.preventDefault () : event.returnValue = false;
                    event.preventDefault();
                    if (!form.note_americaine.value) {
                        var div = document.getElementById('resultat');
                        div.innerHTML = "aucune note choisie";
                        return;
                    }
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.addEventListener('readystatechange', function() {
                        if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                            var div = document.getElementById('resultat');
                            div.innerHTML = xmlhttp.responseText;
                        } else {
                            console.debug(xmlhttp);
                        }
                    });
                    xmlhttp.open('POST', form.action, true);
                    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=utf-8");
                    xmlhttp.send("note_americaine=" + form.note_americaine.value);
                });
            });
        }
        
    };
    index.init();
}) ();
