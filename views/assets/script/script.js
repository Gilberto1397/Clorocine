window.onload = function() {
    document.querySelectorAll(".btn-fav").forEach(btn => {
        btn.addEventListener("click", e => {
            const id = btn.getAttribute("data-id");
            //vai efetuar o fetch, receber a resposta, transformar em json pois virá como array - se o response na chave success for OK, o código irá seguir
            fetch(`/favoritar/${id}`)
                .then(response => response.json())
                .then(response => {
                    if (response.success === "ok") {
                        if (btn.querySelector("i").innerHTML === "favorite") {
                            btn.querySelector("i").innerHTML = "favorite_border";
                        } else {
                            btn.querySelector("i").innerHTML = "favorite";
                        }
                    }
                }).catch(error => {
                    M.toast({
                        html: "Erro ao favoritar"
                    })
                })
    
        });
    });
    
    document.querySelectorAll(".btn-delete").forEach(btn => {
        btn.addEventListener("click", e => {
            const id = btn.getAttribute("data-id");
            const requestConfig = {method: "DELETE", headers: new Headers()}
            //vai efetuar o fetch, receber a resposta, transformar em json pois virá como array - se o response na chave success for OK, o código irá seguir
            fetch(`/filmes/${id}`, requestConfig)
                .then(response => response.json())
                .then(response => {
                    if (response.success === "ok") {
                        const card = btn.closest(".col");
                        card.classList.add("fadeOut");
                        setTimeout(() => card.remove(), 1000); // exclusão após 1s
                    }
                }).catch(error => {
                    M.toast({
                        html: "Erro ao apagar"
                    })
                })
    
        });
    });
}