<?php

//include_once('connexion.php');

    class ModeleDecouvrir {

        public function __construct(){
        }

        public function connexion(){
			session_start();
			$_SESSION['login'] = "Gilgamesh";
			echo "Vous êtes connecté en tant que : " . $_SESSION['login'] ;
			
		}	

		public function deconnexion(){
			session_start();
			if(!empty($_SESSION['login'])){
				$_SESSION = array();
				session_destroy();
				unset($_SESSION);
				echo "Vous êtes deconnecté";
			}
			else{
				echo "Vous n'êtes pas connecté";
			}
		}

        

        public function getListe() {  

            $req = self::$bdd->prepare("SELECT * FROM ");
            $req->execute();
            $tab = $req->fetchAll();

            return $tab;
        }
        
        public function get
 


        public function getDetails($id) {
            $req = self::$bdd->prepare("SELECT * FROM users WHERE id = ?");
            $req->execute(array($id));
            $detail = $req->fetch();
        
            return $detail;
        }

        public function getDetailsTypeImage($typeImage) {
            $req = self::$bdd->prepare("SELECT * FROM users WHERE typeImage = ?");
            $req->execute(array($id));
            $detail = $req->fetch();
        
            return $detail;
        }

        public function search(){
            echo "search";
            return NULL;
    
        }

        public function 

        public function categorie($typeImage){
            switch ($typeImage) {
                case '3d':
                    //$this->modele->getDetailsTypeImage(3d);
                    break;
                case 'paysage':
                    break;
                case 'dessin':
                    break;
                case 'noirblanc':
                    break;
                
                default:
                    # code...
                    break;
            }

        }

        
        
    }
?>
<div id="shopping-cart">
<div class="txt-heading">Shopping Cart</div>

<a id="btnEmpty" href="index.php?action=empty">Empty Cart</a>
<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>	
<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;">Name</th>
<th style="text-align:left;">Code</th>
<th style="text-align:right;" width="5%">Quantity</th>
<th style="text-align:right;" width="10%">Unit Price</th>
<th style="text-align:right;" width="10%">Price</th>
<th style="text-align:center;" width="5%">Remove</th>
<th style="text-align:center;" width="5%">Remove</th>

</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["price"];
		?>
				<tr>
				<td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?></td>
				<td><?php echo $item["code"]; ?></td>
				<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
				<td style="text-align:center;"><a href="index.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
				</tr>
				<?php
                $total = 
				$total_quantity += $item["quantity"];
				$total_price += ($item["price"]*$item["quantity"]);
		}
		?>

<tr>
<td colspan="2" align="right">Total:</td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
<td></td>
</tr>
</tbody>
</table>		
  <?php
} else {
?>
<div class="no-records">Your Cart is Empty</div>
<?php 
}
?>
</div>
