/*
pdfjsLib.GlobalWorkerOptions.workerSrc = '//mozilla.github.io/pdf.js/build/pdf.worker.js';
var name = (localStorage.getItem('doc_name'));
console.log("doc_name:" + name)
const url = "../../StandBackOffice/documentations/" + name;
let pdfDoc = null,
    pageNum = 1,
    pageIsRendering = false,
    pageNumIsPending = null;
const scale = 1.5,
    canvas = document.querySelector('#pdf_render'),
    ctx = canvas.getContext('2d');

//render page
const renderPage = num => {
    pageIsRendering = true;

    //get page
    pdfDoc.getPage(num).then(page => {
        console.log(page)
    })
}

//get document
pdfjsLib.getDocument(url).promise.then(pdfDoc_ => {
    pdfDoc = pdfDoc_;
    console.log(pdfDoc);
    document.querySelector('#page_count').textContent = pdfDoc.numPages;
    renderPage(pageNum);
});*/