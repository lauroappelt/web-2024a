// Função para fechar todos os painéis abertos e remover classe ativa dos ícones
function closeAllPanels() {
    var panels = document.querySelectorAll(".side-panel.open");
    panels.forEach(function (panel) {
        panel.classList.remove("open");
    });

    var icons = document.querySelectorAll(".icon.active");
    icons.forEach(function (icon) {
        icon.classList.remove("active");
    });
}

function togglePanelLogin() {
    var panel = document.getElementById("side-panel-login");
    var icon = document.querySelector('[data-toggle="open-login"] .icon');

    if (panel.classList.contains("open")) {
        panel.classList.remove("open");
        icon.classList.remove("active");
    } else {
        closeAllPanels();
        panel.classList.add("open");
        icon.classList.add("active");
    }
}

document.addEventListener("DOMContentLoaded", function () {
    var toggles = document.querySelectorAll('[data-toggle="open-login"]');
    toggles.forEach(function (toggle) {
        toggle.addEventListener("click", togglePanelLogin);
    });
});

function togglePanelListaCatastrofes() {
    var panel = document.getElementById("side-panel-lista-catastrofes");
    var icon = document.querySelector(
        '[data-toggle="open-lista-catastrofes"] .icon'
    );

    if (panel.classList.contains("open")) {
        panel.classList.remove("open");
        icon.classList.remove("active");
    } else {
        closeAllPanels();
        panel.classList.add("open");
        icon.classList.add("active");
    }
}
document.addEventListener("DOMContentLoaded", function () {
    var toggles = document.querySelectorAll(
        '[data-toggle="open-lista-catastrofes"]'
    );
    toggles.forEach(function (toggle) {
        toggle.addEventListener("click", togglePanelListaCatastrofes);
    });
});

function togglePanelCadastroCatastrofes() {
    var panel = document.getElementById("side-panel-cadastro-catastrofes");
    var icon = document.querySelector(
        '[data-toggle="open-cadastro-catastrofes"] .icon'
    );

    if (panel.classList.contains("open")) {
        panel.classList.remove("open");
        icon.classList.remove("active");
    } else {
        closeAllPanels();
        panel.classList.add("open");
        icon.classList.add("active");
    }
}

// Adiciona evento de clique aos botões de Cadastro de Catástrofes
document.addEventListener("DOMContentLoaded", function () {
    var toggles = document.querySelectorAll(
        '[data-toggle="open-cadastro-catastrofes"]'
    );
    toggles.forEach(function (toggle) {
        toggle.addEventListener("click", togglePanelCadastroCatastrofes);
    });
});
