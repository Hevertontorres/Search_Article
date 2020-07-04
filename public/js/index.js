function searchArticle(event, form) {
    event.preventDefault();
    const inputTitle = form.title;
    if (inputTitle) {
        const title = inputTitle.value;
        const URL = `https://www.uplexis.com.br/blog/?s=${title}`.replace(" ", "+");
        console.log(URL);

        $.ajax({
            type: "GET",
            url: (URL),
            data: "{}",
            success: function (data) {
                document.getElementById("retorno").innerHTML = data;
            }
        });
    }
}
