document.querySelectorAll(".header__nav .nav__link").forEach((link) => {
    let link_url = new URL(link.href);
    let link_file = link_url.pathname;
    if (window.location.pathname.includes(link_file)) {
        link.classList.add("active");
    }
});
document.querySelectorAll(".categories a.category").forEach((link) => {
    let link_url = new URL(link.href);
    let category_id = link_url.searchParams.get("category");
    let params = new URLSearchParams(window.location.search);
    if (params.get("category") == category_id) {
        link.classList.add("active");
    }
});
document.querySelectorAll(".header__btn").forEach((link) => {
    let link_url = new URL(link.href);
    let link_file = link_url.pathname;
    if (window.location.pathname.includes(link_file)) {
        link.classList.add("active");
    }
});