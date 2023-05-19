fetch('http://localhost:8888/knowemup/dashboard/semesters.php')
    .then(response => {
        if (!response.ok) {
            throw new Error("HTTP error " + response.status);
        }
        return response.json();
    })
    .then(data => {
        console.log(data);
        this.data = data;
    })
    .catch(function () {
        this.dataError = true;
    });
