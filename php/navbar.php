<nav class="navbar">
    <div class="content">
        <div class="logo">
            <a href="index.php">Rodav Dalí</a>
        </div>
        <ul class="menu-list">
            <div class="icon cancel-btn">
                <i class="fas fa-times"></i>
            </div>
            <li><a href="index.php">Accueil</a></li>
            <li>
                <a href="#" class="desktop-link text-shadow text-point">Oeuvres</a>
                <input type="checkbox" id="show-features">
                <label for="show-features">Oeuvres</label>
                <ul>
                    <li class="sub-link-hover"><a href="produits.php?cat=albums">Albums 💽</a></li>
                    <li class="sub-link-hover"><a href="produits.php?cat=tableaux">Tableaux 🎨</a></li>
                    <li class="sub-link-hover"><a href="produits.php?cat=mode">Mode 🧦</a></li>

                </ul>
            </li>

            <li><a href="contact.php" >Contact</a></li>
            <?php if(!$okconnectey) {?> 
            <li><a href="sign.php" class="buttons-magique user-btn"><i class="fas fa-user"></i></a></li> <?php } else { ?>

            <li>


                <a href="#" class="desktop-link buttons-magique "><i class="fas fa-user"></i></a>


                <input type="checkbox" id="show-features">
                <label for="show-features"><i class="fas fa-user"></i><?= $_SESSION['user_pseudo']; ?> </label>
                <ul class="ululul">
                    <li class="sub-link-hover"><a href="deconnexion.php">Déconnexion <i class="fas fa-power-off"></i></a></li>
                </ul>
            </li>
            <li> <span class="labelPseudo" for="show-features"><?= $_SESSION['user_pseudo']; ?> </span></li>
            <?php } ?>
            
            <?php if($okconnectey) {?> 
            <li>
                <button id="myBtnModal" class="cart-nav">
                   
                        <div class="icon">

                            <i class="fas fa-shopping-cart"></i>
                            <span>Cart</span>
                        </div>
                        <div class="item-count"><?= count($_SESSION["user_panier"])?></div>
                        <div class="item-iconshop"><i class="fas fa-shopping-cart"></i></div>
                    
                </button>
            </li> 
            <?php } ?>
        </ul>
        <div class="icon menu-btn">
            <i class="fas fa-bars"></i>
        </div>
   
    </div>
</nav>


<?php if($okconnectey) {?> 
<!-- The Modal -->
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
            <h2>Mon Panier</h2>
        </div>
        <div class="modal-body">



            <div class="shopping-cart">
                

                <?php 
                        $PrixTotalPan = 0;
                        
                        foreach($_SESSION['user_panier'] as $pan) {
    $prod = $Produits[$pan['type']][$pan['id']];
 $PrixTotalPan += $prod['Price']*$pan['quantity'];
                ?> 
                <!-- Product #1 -->
                <div class="item">

                    <div class="buttons">
                        <button class="delete-btn" onclick="delete1ProduitPan()"><i class="fas fa-trash-alt"></i></button>

                    </div>


                    <div class="image">
                        <img class="imgCoverPan" src="<?=$prod['src']?>" alt="" />
                    </div>

                    <div class="description">
                        <span><?=$prod['Title']?></span>
                        <span><?=$prod['Author']?></span>

                    </div>

                    <div class="quantity">
                        <button class="plus-btn" type="button" name="button" onclick="moin2('<?=$pan['key']?>')" >–</button>
                        <input id="nbQtePanier<?=$pan['key']?>" type="number" class="session-time mx-2" value="<?=$pan['quantity']?>" disabled>
                        <button class="minus-btn" type="button" name="button" onclick="plus2('<?=$pan['key']?>',<?=$prod['Quantity'] ?>)">+</button>
                    </div>

                    <div class="total-price">$<?=$prod['Price']?></div>
                </div>
                <?php } ?>
                
                <!-- Title -->
                <div class="titlePanier">
                    Total : <b>$<?=$PrixTotalPan?></b>
                </div>
            </div>

        </div>

    </div>

</div>
<script type="text/javascript" >

    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btnModal = document.getElementById("myBtnModal");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btnModal.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    
    function plus2(id,max) {
    let input = document.getElementById("nbQtePanier"+id);
    if(input.value < max) {
        let x = parseInt(input.value);
        input.value = x+1;
    }
}
function moin2(id) {
    let input = document.getElementById("nbQtePanier"+id);
    if(input.value > 0) {
         let x = parseInt(input.value);
        input.value = x-1;
    } 
}
    function delete1ProduitPan() {
        alert();
    }
    
    
</script>


<?php }?> 