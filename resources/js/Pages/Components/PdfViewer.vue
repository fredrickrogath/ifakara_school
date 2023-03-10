<template>
    <div>
      <canvas ref="canvas"></canvas>
      <button @click="printPdf">Print</button>
    </div>
  </template>
  
  <script>
  const pdfjsLib = require('pdfjs-dist/legacy/build/pdf.js'); // <-- use CommonJS require statement
  
  export default {
    props: {
      src: {
        type: String,
        required: true,
      },
    },
    data() {
      return {
        pdfDocument: null,
        currentPage: 1,
        canvas: null,
      };
    },
    async mounted() {
      this.canvas = this.$refs.canvas;
      await this.loadPdfDocument();
      await this.renderPage(this.currentPage);
    },
    methods: {
      async loadPdfDocument() {
        const loadingTask = pdfjsLib.getDocument(this.src);
        this.pdfDocument = await loadingTask.promise;
      },
      async renderPage(pageNumber) {
        const page = await this.pdfDocument.getPage(pageNumber);
        const viewport = page.getViewport({ scale: 1 });
        this.canvas.height = viewport.height;
        this.canvas.width = viewport.width;
        const renderContext = {
          canvasContext: this.canvas.getContext('2d'),
          viewport,
        };
        await page.render(renderContext);
      },
      async printPdf() {
        const pageUrl = this.canvas.toDataURL('image/png');
        const printWindow = window.open('', 'Print', 'height=600,width=800');
        printWindow.document.write(`<html><head><title>Print</title></head><body><img src="${pageUrl}"/></body></html>`);
        printWindow.document.close();
        printWindow.focus();
        printWindow.print();
      },
    },
  };
  </script>
  