(function() {
    //write event handler
    var httpRequest;
    document.getElementById("button").onclick = function() {makeRequest('courses.json');
 };
 //Create a XMLHttpRequest object
 function makeRequest(url) {
    httpRequest = new XMLHttpRequest();
    //provides alert if not successful
    if (!httpRequest) {
        alert("Object not created!");
        return false;
    }
        httpRequest.onreadystatechange = alertContents;
        //make request with open() and send()
        httpRequest.open('GET',url);
        httpRequest.send();
 }
 //check for state of the request if it is done
 function alertContents(){
    if (httpRequest.readyState === XMLHttpRequest.DONE) {
        //check response code
        if (httpRequest.status === 200) {
            //if successful write the reponseText property
            var index = 0;
            var object = httpRequest.responseText;
            var obj = JSON.parse(object);


            document.writeln("<table border = '2'><tr>");
            document.write("<h2>My Courses</h2>");
            for(index = 0; index < obj.myCourses.length; index++){
                document.writeln("<td>");
                document.writeln("<table style=\"width:100%\">");
                document.writeln("<tr><td><i><b>Term: </b></i></td><td>" + obj.myCourses[index].term+"</td></tr>");
                document.writeln("<tr><td><i><b>Course: </b></i></td><td>" + obj.myCourses[index].course+"</td></tr>");
                document.writeln("<tr><td><i><b>Grade: </b></i></td><td>" + obj.myCourses[index].grade+"</td></tr>");

                document.writeln("</table>");
                document.writeln("</td>");

            }
              document.writeln("<table border = '2'><tr>");
              document.body.style.background ="#ffe6e6";
              document.body.style.text = "white";
              

        } else {
            //for unsuccessful ajax call
            alert('There was a problem with request.');
        }
    }
     
 }

})();