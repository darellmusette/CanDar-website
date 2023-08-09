<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet version="1.0"
  xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

  <xsl:template match="/">


    <!-- <html>
      <head>
        <title>Product Catalog</title>
      </head>
      <body>
        <table>
          <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Image</th>
          </tr>
          <xsl:for-each select="Products/product">
            <tr>
              <td><xsl:value-of select="name"/></td>
              <td><xsl:value-of select="price"/></td>
              <td><img src="{image/@src}" /></td>
            </tr>
          </xsl:for-each>
        </table>
      </body>
    </html> -->



    <div class="product-container">
      <xsl:for-each select="Products/product">

        <div class="card">
          <div class="title">
            <h2>
              <xsl:value-of select="name" />
            </h2>
          </div>

          <div class="image">
            <img src="{image/@src}" />
          </div>

          <div class="text">
            <h2>
              <xsl:value-of select="price" />
            </h2>
          </div>


          <form id="product-form" method="post" onsubmit="addCartItemToXML" action="productpage1.php">
            <input type="hidden" name="hidden_name" value="{name}" />
            <input type="hidden" name="hidden_price" value="{price}" />
            <input type="hidden" name="quantity" value="1" />
            <input type="submit" name="add_to_cart" class="buy-button" value="Add to cart" />
          </form>


        </div>

      </xsl:for-each>


    </div>

  </xsl:template>
</xsl:stylesheet>