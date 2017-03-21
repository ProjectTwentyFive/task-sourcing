'use strict'

function fillCategory(taskName) {
    var category = document.getElementById(taskName).getAttribute("category")
    document.getElementById("category").value = category
}
