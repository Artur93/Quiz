window.onload = function () {
        var form = document.getElementById("forms");
        var drowTab = function(){
            var response;
            var get = new XMLHttpRequest();
            var action = form.action;
            var method = form.method;
            get.onreadystatechange = function () {
                if (get.readyState == 4) {
                    response = JSON.parse(get.response);
                    for(var i = 0; i<response.length; i++){
                        var table = document.getElementById('table').getElementsByTagName('tbody')[0];
                        var row   = table.insertRow(table.rows.length);
                        var note =  row.insertCell(0);
                        var id   =  row.insertCell(1);
                        var date =  row.insertCell(2);
                        var del =  row.insertCell(3);
                        note.innerHTML = response[i].note;
                        id.innerHTML = response[i].id;
                        date.innerHTML = response[i].date;
                        del.innerHTML = '<a class="delete" href="#" data-id =' + response[i].id +'>' + '#' +'</a>';
                        var delnote = document.getElementsByClassName("delete");

                    }
                    for(var i = 0; i<delnote.length; i++){
                        delnote[i].addEventListener("click", function(){
                            var query = "delete=" + this.getAttribute("data-id");
                            var delAjax = new XMLHttpRequest();
                            delAjax.open(method, action, true);
                            delAjax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                            delAjax.send(query);
                            this.parentNode.parentNode.innerHTML = "";
                            console.log(this.parentNode.parentNode);
                        }, false);
                    }
                }
            }
            get.open('GET', action + '?get=1', true);
            get.send(null);
        }
        drowTab();
        var delTab = function(){
            var table = document.getElementById("table");

            for(var i = table.rows.length - 1; i > 0; i--){
                table.deleteRow(i);
            }
        }

        form.onsubmit = function () {
            var action = form.action;
            var method = form.method;
            var textArea = form.note.value.trim();
            var URLencoderString = "note=" + textArea;
            var post = new XMLHttpRequest();

            post.open(method, action, true);
            post.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            post.send(URLencoderString);
            var response;

            post.onreadystatechange = function () {
                if (post.readyState == 4 && post.status == 201) {
                    response = JSON.parse(post.response);
                    alert(response.status.message);
                    delTab();
                    drowTab();
                } else if (post.readyState == 4 && post.status == 400) {
                    response = JSON.parse(post.response);
                    alert(response.status.message);
                }
            };

            return false;
        }
    }