<?php

use App\Http\Livewire\Account;
use App\Http\Livewire\Accueil;
use App\Http\Livewire\Acheminement;
use App\Http\Livewire\Admins;
use App\Http\Livewire\ArchiveProduct;
use App\Http\Livewire\Baremes;
use App\Http\Livewire\Cart;
use App\Http\Livewire\Categories;
use App\Http\Livewire\Checkout;
use App\Http\Livewire\Clients;
use App\Http\Livewire\Commande;
use App\Http\Livewire\Commentaire;
use App\Http\Livewire\Contactus;
use App\Http\Livewire\Home;
use App\Http\Livewire\Login;
use App\Http\Livewire\Partenaires;
use App\Http\Livewire\Products;
use App\Http\Livewire\Profil;
use App\Http\Livewire\SingleProduct;
use App\Http\Livewire\Tags;
use App\Http\Livewire\Visiteurs;
use App\Http\Livewire\Wishlist;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/", Accueil::class)->name("accueil");
Route::get("connexion", Login::class)->name("login");
Route::get("tableau_de_bord", Home::class)->name("home");
Route::get("products", Products::class)->name("product");
Route::get("categories", Categories::class)->name("category");
Route::get("baremes", Baremes::class)->name("bareme");
Route::get("acheminement", Acheminement::class)->name("acheminement");
Route::get("commentaires", Commentaire::class)->name("commentaire");
Route::get("commande", Commande::class)->name("commande");
Route::get("clients", Clients::class)->name("client");
Route::get("administrateurs", Admins::class)->name("admin");
Route::get("carts", Cart::class)->name("cart");
Route::get("checkout", Checkout::class)->name("checkout");
Route::get("contact", Contactus::class)->name("contactus");
Route::get("account", Account::class)->name("account");
Route::get("tags", Tags::class)->name("tag");
Route::get("wishlist", Wishlist::class)->name("wishlist");
Route::get("visiteur", Visiteurs::class)->name("visiteur");
Route::get("partenaires", Partenaires::class)->name("partenaire");
Route::get("mon-profil", Profil::class)->name("profil");
Route::get("produit/{id}", SingleProduct::class)->name("singleProduct");
Route::get("archive-produit/{slug}-{id}", ArchiveProduct::class)->name("archiveProduct");

