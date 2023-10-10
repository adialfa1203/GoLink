 <footer>
     <div class="top_footer" id="kontak">
         <div class="container">
             <div class="row">
                 <!-- Logo -->
                 <div class="col-lg-3 col-md-6 col-12">
                     <div class="abt_side">
                         <div class="logo">
                             <img src="https://i.postimg.cc/QdZvjL3f/Logo-LINK-ID.png" alt="image"
                                 style="margin-top: -27%;">
                             <ul style="margin-top: -16%; margin-right:40px;">
                                 <li style="color: white; font-size:14px;">S.id adalah platform untuk orang-orang
                                     untuk menunjukkan keahlian mereka dalam membuat situs mikro dan memperpendek
                                     tautan terpendek dengan kode s.id/.</li>
                             </ul>
                         </div>
                     </div>
                 </div>

                 <!-- Footer Links -->

                 <div class="col-lg-2 col-md-6 col-12">
                     <div class="links">
                         <h3>Dukungan</h3>
                         <ul>
                             <li><a href="/Home">Bantuan</a></li>
                             <li><a href="#features">Laporkan</a></li>
                             <li><a href="#kontak">Status</a></li>
                         </ul>
                     </div>
                 </div>
                 <div class="col-lg-2 col-md-6 col-12">
                     <div class="links">
                         <h3>SiteMaps</h3>
                         <ul>
                             <li><a href="#kontak">Beranda</a></li>
                             <li><a href="/Home">Perpendek Link</a></li>
                             <li><a href="#features">Situs Mikro</a></li>
                             <li><a href="#kontak">Berlanggaan</a></li>
                             <li><a href="/HelpSupport">Bantuan dan Dukungan</a></li>
                             <li><a href="/HelpSupport">Kebijakan Privasi</a></li>

                         </ul>
                     </div>
                 </div>

                 <!-- Contact Information -->
                 <div class="col-lg-2 col-md-6 col-12">
                     <div class="links">
                         <h3>Hubungi Kami</h3>
                         <ul style="text-align: justify;">
                             <li>
                                 <a href="https://wa.me/085606270454">
                                     <i class="fab fa-whatsapp"></i>
                                     085606270454
                                 </a>
                             </li>
                             <li>
                                 <a href="#features">
                                     <i class="fab fa-instagram"></i>
                                     @Go.link
                                 </a>
                             </li>
                             <li>
                                 <a href="#features">
                                     <i class="fab fa-twitter"></i>
                                     @Go.link
                                 </a>
                             </li>
                         </ul>
                     </div>
                 </div>
                 <!-- Comment Form -->
                 <div class="col-lg-3 col-md-6 col-12 mb-1">
                     <form action="{{ route('create', ['id' => Auth::user()->id]) }}" id="commentForm" method="POST"
                         enctype="multipart/form-data" class="mt-3">
                         @csrf
                         <textarea class="form-control bg-light border-light" id="exampleFormControlTextarea1" rows="3"
                             placeholder="Tambahkan Komentar" name="isikomentar" style="font-size:12px ;"></textarea>
                         @error('isikomentar')
                             <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <div class="text-start mt-2">
                             <button type="submit" class="btn btn-success">Kirim</button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>

     <!-- Bottom Footer -->
     <div class="bottom_footer">
         <div class="container">
             <div class="row">
                 <div class="col-md-12 text-right">
                     <p>© Go.Link Dikelola oleh PT. Hummatech</p>
                 </div>
             </div>
         </div>
     </div>

     <!-- Go Top Button -->
     <div class="go_top">
         <span><img src="https://i.postimg.cc/MZtYYpPg/go-top.png" alt="image"></span>
     </div>
 </footer>
