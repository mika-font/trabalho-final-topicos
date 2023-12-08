function editar(evt) {
    let id = evt.currentTarget.paramId;
    let tbody = document.getElementById("instrumentos");
    for (const tr of tbody.children) {
        if (tr.children[0].innerHTML == id) {
            let id = document.getElementsByName("id")[0];
            let nome = document.getElementsByName("nome")[0];
            let marca = document.getElementsByName("marca")[0];
            let valor = document.getElementsByName("valor")[0];
            let categoria = document.getElementsByName("categoria")[0];
            let descricao = document.getElementsByName("descricao")[0];
        
            id.value = tr.children[0].innerHTML;
            nome.value = tr.children[1].innerHTML;
            marca.value = tr.children[2].innerHTML;
            valor.value = tr.children[3].innerHTML;
            categoria.value = tr.children[4].innerHTML;
            descricao.value = tr.children[5].innerHTML;
        }
    }
}
function excluir(evt) {
    let excluir = confirm("Tem certeza que deseja excluir esse instrumento?");
    if (excluir == true) {
        let id = evt.currentTarget.paramId;
        fetch("excluir.php?id=" + id, {
            method: "GET",
            headers: { 'Content-type': "application/json; charset=UTF-8" }
        })
            .then(response => response.json())
            .then(instru => excluirInstru(instru))
            .catch(error => console.log(error));
    }
}

function excluirInstru(instru) {
    let tbody = document.getElementById("instrumentos");
    for (const tr of tbody.children) {
        if (tr.children[0].innerHTML == instru.id) {
            tbody.removeChild(tr);
        }
    }
}

function salvarInstru(event) {
    event.preventDefault();
    let form = document.getElementById("form");
    let tbody = document.getElementById("instrumentos");
    let instru = Object.fromEntries(new FormData(form).entries());

    if (instru.id == "") {
        fetch("salvar.php", {method: "POST", body: JSON.stringify(instru), headers: { 'Content-type': "application/json; charset=UTF-8" }})
            .then(response => response.json())
            .then(instru => inserirInstru(instru))
            .catch(error => console.log(error));
    } else {
        fetch("salvar.php", {method: "PUT", body: JSON.stringify(instru), headers: { 'Content-type': "application/json; charset=UTF-8" }})
            .then(response => response.json())
            .then(instru => alterarInstru(instru))
            .catch(error => console.log(error));
    }

    form.reset();
    return false;
}

function inserirInstru(instru) {
    let rs = "R$";
    let tr = document.createElement("tr");
    let tdId = document.createElement("td");
    tdId.innerText = instru.id;
    let tdNome = document.createElement("td");
    tdNome.innerText = instru.nome;
    let tdMarca = document.createElement("td");
    tdMarca.innerText = instru.marca;
    let tdValor = document.createElement("td");
    tdValor.innerText = instru.valor;
    let tdCategoria = document.createElement("td");
    tdCategoria.innerText = instru.categoria;
    let tdDescricao = document.createElement("td");
    tdDescricao.innerText = instru.descricao;

    let tdEditar = document.createElement("td");
    let btnEditar = document.createElement("button");
    btnEditar.addEventListener("click", editar, false);
    btnEditar.paramId = instru.id;
    btnEditar.innerHTML = "Editar";
    tdEditar.appendChild(btnEditar);

    let tdExcluir = document.createElement("td");
    let btnExcluir = document.createElement("button");
    btnExcluir.addEventListener("click", excluir, false);
    btnExcluir.paramId = instru.id;
    btnExcluir.innerHTML = "Excluir";
    tdExcluir.appendChild(btnExcluir);

    tr.appendChild(tdId);
    tr.appendChild(tdNome);
    tr.appendChild(tdMarca);
    tr.appendChild(tdValor);
    tr.appendChild(tdCategoria);
    tr.appendChild(tdDescricao);
    tr.appendChild(tdEditar);
    tr.appendChild(tdExcluir);
    let tBody = document.getElementById("instrumentos");
    tBody.appendChild(tr);
}

function alterarInstru(instru) {
    let tbody = document.getElementById("instrumentos");
    for (const tr of tbody.children) {
        if (tr.children[0].innerHTML == instru.id) {
            tr.children[1].innerHTML = instru.nome;
            tr.children[2].innerHTML = instru.marca;
            tr.children[3].innerHTML = instru.valor;
            tr.children[4].innerHTML = instru.categoria;
            tr.children[5].innerHTML = instru.descricao;
        }
    }
}

function listarTodos() {
    fetch("listar.php", { method: "GET", headers: { 'Content-type': "application/json; charset=UTF-8" }})
        .then(response => response.json())
        .then(instrumentos => inserirInstrumentos(instrumentos))
        .catch(error => console.log(error));
}

function inserirInstrumentos(instrumentos) {
    for (const instru of instrumentos) {
        inserirInstru(instru);
    }
}
document.addEventListener("DOMContentLoaded", () => { listarTodos(); });