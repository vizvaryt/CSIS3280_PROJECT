<?php

class Page  {

    public static $title = "CSIS3280 PROJECT";

    static function header()   { ?>
        <!-- Start the page 'header' -->
        <!DOCTYPE html>
        <html>
            <head>
                <title></title>
                <meta charset="utf-8">
                <meta name="author" content="Bambang">
                <title><?php echo self::$title; ?></title>   
                <link href="css/styles.css" rel="stylesheet">     
            </head>
            <body>
                <header>
                    <h1>Bookstore Demo</h1>
                </header>
                <article>
    <?php }

    static function footer()   { ?>
        <!-- Start the page's footer -->            
                </article>
            </body>

        </html>

    <?php }

    static function listBooks($bookData)    {
    ?>
        <!-- Start the page's show data form -->
        <section class="main">                
            <h2>Current Data</h2>
            <table>
                    <thead><tr>
                        <th>ISBN</th>                        
                        <th>Title</th>
                        <th>Author</th>
                        <th>Price</th>
                        <th>Delete</th>
                        <th>Edit</th>                        
                    </tr></thead>
    <?php
        // code how you want to list them here
        $count = 0;
        foreach($bookData as $book){
            if($count % 2 == 0){ // even row
                echo "<tbody class=\"evenRow\">";
            }
            else{
                echo "<tbody class=\"oddRow\">";
            }
            // display the row data
            echo "<tr>";
            echo "<td>{$book->getISBN()}</td>";
            echo "<td>{$book->getTitle()}</td>";
            echo "<td>{$book->getAuthor()}</td>";
            echo "<td>{$book->getPrice()}</td>";
            echo "<td><a href={$_SERVER['PHP_SELF']}?action=delete&isbn={$book->getISBN()}>Delete</a></td>";
            echo "<td><a href={$_SERVER['PHP_SELF']}?action=edit&isbn={$book->getISBN()}>Edit</a></td>";
            echo "</tr>";
            echo "</tbody>";

            $count++;
        }
  
    }

    static function showAddForm()   { ?>        
        <!-- Start the page's add entry form -->
        <section class="form1">
                <h2>Add a new entry</h2>
                <form method="post" ACTION="<?php echo $_SERVER["PHP_SELF"]; ?>">
                    ISBN: <input type="text" name="isbn" size=30 placeholder="X-XXX-XXXXX-X"><br>
                    Title: <input type="text" name="title" size=30 placeholder="Book Title"><br>
                    Author: <input type="text" name="author" size=30 placeholder="Book Author"><br>
                    Price: <input type="text" name="price" size=30 placeholder="Book Price XX.XX"><br>
                    <input type="submit" name="submit" value="Add entry">
                </form>
            </section>

    <?php }

    static function showEditForm(Book $book)   { ?>        
        <!-- Start the page's add entry form -->
        <section class="form1">
                <h2>Edit entry of book with ISBN <?= $book->getISBN() ?></h2>
                <form method="post" ACTION="<?php echo $_SERVER["PHP_SELF"]; ?>">                    
                    Title: <input type="text" name="title" size=30 placeholder="Book Title" value="<?= $book->getTitle()?>"><br>
                    Author: <input type="text" name="author" size=30 placeholder="Book Author" value="<?= $book->getAuthor()?>"><br>
                    Price: <input type="text" name="price" size=30 placeholder="Book Price XX.XX" value="<?= $book->getPrice()?>"><br>
                    <input type="hidden" name="isbn" value="<?= $book->getISBN();?>">
                    <input type="hidden" name="action" value="edit">
                    <input type="submit" name="submit" value="Edit entry">
                </form>
            </section>

    <?php }
}