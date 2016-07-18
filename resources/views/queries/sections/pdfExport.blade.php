<div class="box">
        <h4>Export page content</h4>
        <div class="box-col">
            <button class='export-pdf k-button btn btn-default'>Export as PDF</button>
        </div>
    </div>

    <style>
    /*
        Use the DejaVu Sans font for display and embedding in the PDF file.
        The standard PDF fonts have no support for Unicode characters.
    */
    .k-widget {
        font-family: "DejaVu Sans", "Arial", sans-serif;
        font-size: .9em;
    }
  </style>

  <script>
      // Import DejaVu Sans font for embedding

      // NOTE: Only required if the Kendo UI stylesheets are loaded
      // from a different origin, e.g. cdn.kendostatic.com
      kendo.pdf.defineFont({
          "DejaVu Sans"             : "http://cdn.kendostatic.com/2014.3.1314/styles/fonts/DejaVu/DejaVuSans.ttf",
          "DejaVu Sans|Bold"        : "http://cdn.kendostatic.com/2014.3.1314/styles/fonts/DejaVu/DejaVuSans-Bold.ttf",
          "DejaVu Sans|Bold|Italic" : "http://cdn.kendostatic.com/2014.3.1314/styles/fonts/DejaVu/DejaVuSans-Oblique.ttf",
          "DejaVu Sans|Italic"      : "http://cdn.kendostatic.com/2014.3.1314/styles/fonts/DejaVu/DejaVuSans-Oblique.ttf"
      });
  </script>

  <!-- Load Pako ZLIB library to enable PDF compression -->
  <script src="http://cdn.kendostatic.com/2015.1.429/js/pako_deflate.min.js"></script>

  <script>
  $(document).ready(function() {

      $(".export-pdf").click(function() {
          // Convert the DOM element to a drawing using kendo.drawing.drawDOM
          $('#table1').css('display', 'none');
          $('#table2').css('display', 'block');
          $('#pages').css('display', 'none');
          $('.footer').css('display', 'block');
          $('.header').css('display', 'block');
          $('#boton').css('display', 'none');
          kendo.drawing.drawDOM($(".content-wrapper"))
          .then(function(group) {
              // Render the result as a PDF file
              return kendo.drawing.exportPDF(group, {
                  paperSize: "auto",
                  margin: { left: "1cm", top: "1cm", right: "1cm", bottom: "1cm" }
              });
          })
          .done(function(data) {
              // Save the PDF file
              kendo.saveAs({
                  dataURI: data,
                  fileName: "HR-Dashboard.pdf",
                  proxyURL: "http://demos.telerik.com/kendo-ui/service/export"
              });

              $('#table1').css('display', 'block');
              $('#table2').css('display', 'none');
              $('#pages').css('display', 'block');
              $('.footer').css('display', 'none');
              $('.header').css('display', 'none');
              $('#boton').css('display', 'block');
              
              });
          /*
          $('#table1').css('display', 'block');
          $('#table2').css('display', 'none');
          $('#pages').css('display', 'block');
          $('.footer').css('display', 'none');
          $('.header').css('display', 'none');
          $('#boton').css('display', 'block');*/
      });

    });

    </script>