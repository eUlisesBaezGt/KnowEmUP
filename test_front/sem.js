fetch('http://localhost/knowemup/test_front/index.php')
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
