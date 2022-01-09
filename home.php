<div class="page-header">
    <h1>Diagnosa Penyakit Tanaman Tembakau dengan Metode Fuzzy K-NN</h1>
</div>
<p><h3>Pendahuluan</h3>
Ada 3 Hal Masalah yang Dihadapi Oleh Tanaman Tembakau yaitu, Serangan dari Bakteri, Jamur, dan Virus. Yang Dimana hingga saat ini Bakteri, Jamur, dan Virus yang menyerang tanaman tembakau dengan banyak variasi. Banyak orang, bahkan petani sendiri kesulitan membedakan Penyebab penyakit yang menyerang Tanaman Tembakau milik Petani, hal ini dikarekan sebagian besar petani kekurangan informasi serta masih bergantung dari pengalaman petani lain yang sudah berkecimpung dalam dunia perkebunan Tembakau untuk mengatasi permasalahan Serangan Pada Tanaman Tembakau yang di sebabkan Bakteri, Jamur, dan Virus yang ada. </p>

<p>Sering kali terjadi kesalahan dalam membedakan Penyaebab penyakit, misal Serangan dari Virus diberantas dengan Cara yang Sama Untuk Memberantas Serangan dari Jamur , begitupun sebaliknya, Penyakit yang disebabkan Oleh Jamur diberantas dengan Cara yang Sama Untuk Memberantas Serangan dari Virus. Akibatnya Bakteri, Jamur, dan Virus tidak terkendali dan tetap menyerang tanaman Tembakau, sehingga merugikan banyak biaya yang harus dikeluarkan dan tenaga. Oleh karena itu sangat dibutuhkan Sistem yang Bekerja layaknya Seperti seorang konsultan pertanian yang mampu mendiagnosa Penyakit yang Diserang Oleh Bakteri, Jamur, dan Virus pada tanaman tembakau.</p>

<br/>

<p><h4 style="font-size: 20px;">Algoritma K-Nearest Neighbor (K-NN)</h4>
Metode K-Nearest Neighbor (K-NN) adalah metode yang digunakan dalam klasifikasi dengan melakukan prediksi pada data uji berdasarkan jarak tetangga terdekat. Jarak terdekat yang dimaksud adalah jarak yang terpendek. Metode K-NN mengklasifikasikan objek berdasarkan jarak terdekat terhadap data training sehingga dapat memperkirakan objek tersebut masuk ke dalam sebuah kelas. Prinsip kerja metode K-NN adalah mencari jarak berdasarkan tetangga terdekat antara data uji dengan K tetangga terdekatnya terhadap data latih. Untuk dapat menghitung jarak berdasarkan jarak tetangga terdekat dapat menggunakan rumus Euclidean Distance. (Beyan, 2014)<br />
Tahapan dalam teknik K-Nearest Neighbor	dapat dilakukan dengan (H.Ninki, 2008):<br />
1. Menentukan parameter k (jumlah tetangga	paling dekat)<br />
2. Menghitung kuadrat jarak Euclid (query instance) masing-masing obyek terhadap data sampel yang diberikan<br />
3. Kemudian mengurutkan obyek-obyek tersebut kedalam kelompok yang mempunyai jarak euclid terkecil<br />
4. Mengumpulkan kategori Y (klasifikasi nearest neighbor)<br />
5. Dengan menggunakan kategori nearest neighbor yang paling mayoritas maka dapat diprediksi nilai query instance yang telah dihitung Dekat atau jauhnya tetangga biasanya dihitung berdasarkan Euclidean Distance yang dituangkan dalam rumus:<br />
<img src="image/knn.png" />
</p>

<br/>

<p><h4 style="font-size: 20px;"> Algoritma Fuzzy K-Nearest Neighbor (FK-NN)</h4>
FK-NN merupakan penggabungan antara pengembangan K-NN dan teori fuzzy dalam pemberian label kelas pada data uji (Prasetyo, 2012). FK-NN diterapkan pada sistem ini karena dalam penentuan kelas akhirnya tidak hanya memperhitungkan jumlah data yang mengikuti sebuah kelas tetapi juga jarak pada tetangga terdekatnya. Formula FK-NN dinyatakan dalam persamaan berikut:<br />
<img src="image/fknn.png" /></p>

<br />
<hr />

<p><h3>Jenis Penyakit pada Tanaman Tembakau</h3>
                  <hr />
<h2>1. Penyakit Lanas</h2>                
<p> 

<br />
A.	Gejala Penyakit<br />
1.  Bibit Berwarna Hijau Tua Kotor dan Rebah. <br />
2.  Bercak Berbentuk Lingkaran Konsentrik Berwarna Hijau zaitun kekuning. <br />
3.  Pada daerah Daun Timbul Bercak-Bercak. <br />
4.  Daun-Daun terkulai secara serentak dan secara mendadak. <br /> 

<br />
B.	Penyebab Penyakit <br />
1.  Penyebab Penyakit adalah Jamur Pytophthora parasitica Var.Nicotianae (Breda de Haan) Tucker. <br />

<br />
C.	Pemberantasan Penyakit <br />
1.  Sanitasi Lapangan dengan membuag dan membakar sisa tanaman. <br />
2.  Menanam varietas yang tahan, baik terhadap phytophthora maupun terhadap nematoda penyebab luka pada akar tanaman. <br />
3.  Penyemprotan dengan menggunakan dithane M-45, konsentrasi 0.2% dengan interval 10 hari, atau fungsida dari golongan karbonat lainnya. <br />


 </p>              
<hr />

<h2>2. Embun Bulu</h2>                
<p> 

<br />
A.  Gejala Penyakit<br />
1.  Pada Permukaan atas Daun Timbul Bercak-bercak Berwarna Hijau Muda. <br />
2.  Pada Permukaan Bawah Daun Timbul Bercak-bercak Berwarna Coklat. <br />
3.  Pada Tanaman Muda bagian Jaringan pada daun menjadi Berwarna Coklat dan Mati. <br />


<br />
B.  Penyebab Penyakit <br />
1.  Penyebab Penyakit adalah Jamur Peronospora tabacina Adam. <br />

<br />
C.  Pemberantasan Penyakit <br />
1.  Mengadakan Sterilisasi Tanah Pesemaian. <br />
2.  Mengusahakan Varietas Tanah yang Tahan. <br />
3.  Melakukan Penyemprotan dengan menggunakan Fungsida senyawa ditiokarbonat dua kali dalam seminggu. <br />
4.  Membuat Pembibitan yang terisolasi dari sumber inoculum(bahan padat/cair yang mengandung mikrobia/spora/enzim). <br />

</p>
<hr />

<h2>3. Bercak Cercospora</h2>
<p>

<br />
A.  Gejala Penyakit<br />
1.  Pada Permukaan atas daun Terlihat Bintik-Bintik Kecil Berwarna Hitam. <br /> 
2.  Pada permukaan bawah daun Terlihat Bintik-Bintik Kecil Berwarna coklat. <br />
3.  Timbulnya bitnik-bintik sangat dipengaruhi oleh kelembapan cuaca. <br />


<br />
B.  Penyebab Penyakit <br />
1.  P1. Penyebab Penyakit adalah Jamur Cercospora Nicotianae. <br />

<br />
C.  Pemberantasan Penyakit <br />
1.  Sterilisasi tanah Pesemaian, mengatur kelembapan dengan drainase yang baik, Penyinaran Matahari yang cukup, dan jarak tanam bibit yang baik. <br />
2.  Memusnahkan bibit yang memperlihatkan gejala serangan. <br />
3.  Dianjurkan untuk waktu tanam dimana dengan kondisi cuaca panas. <br /> 
4.  Pengelolahan tanah yang baik. <br />

</p>
<hr />

<h2>4. Penyakit Layu</h2>
<p>

<br />
A.  Gejala Penyakit<br />
1.  Kondisi Daun Terkulai.<br /> 
2.  Daun Memucat. <br />
3.  Pada Bagian Urat-urat Daun Berwarna Kuning. <br />


<br />
B.  Penyebab Penyakit <br />
1.  Penyakit ini Ditimbulkan oleh Bakteri Pseudomonas Solanacearum E.F.Smith yang Banyak Mempunyai Tanaman Inang. <br />

<br />
C.  Pemberantasan Penyakit <br />
1.  Sanitasi Pesemaian dan Lapangan. <br />
2.  Penggunaan Varietas yang Tahan. <br />
3.  Mengadakan Pemupukan yang Seimbang. <br />

</p>
<hr />

<h2>5. Bercak Daun</h2>
<p>

<br />
A.  Gejala Penyakit<br />
1.  Pada Tanaman Muda Timbul Busuk Basah <br />
2.  Pada Bagian yang Membusuk kemudian akan Kering dan Terlepas. <br />
3.  Pada Pusat Bercak timbul Warna Coklat beserta Cincin Berwarna Kuning.<br /> 
4.  bercak timbul pada daun bagian bawah dan akan menyebar pada kondisi suhu lembab. <br />


<br />
B.  Penyebab Penyakit <br />
1.  Penyakit ini Ditimbulkan oleh Bakteri Pseudomonas tabaci (Wolf, & Foster) Stevens. <br />

<br />
C.  Pemberantasan Penyakit <br />
1.  Benih Harus dipilih dari tanaman yang sehat. <br />
2.  Mengadakan Penyemprotan dengan campuran bordo atau senyawa Cu lainnya. <br />
3.  Mengadakan sanitasi lapangan. <br />
4.  Mengadakan sanitasi Pesemaian. <br />
5.  Bibit sebaiknya diambil dari Pesemaian yang bebas Penyakit. <br />

</p>
<hr />

<h2>6. Mosaik Tembakau</h2>
<p>

<br />
A.  Gejala Penyakit<br />
1.  Tanaman yang Terinfeksi Menjadi Kerdil dan Diiringi dengan Pertumbuhan daun yang Tidak Normal. <br />
2.  Helaian Daun Menjadi Sempit dan Tidak Teratur Bentuknya. <br />
3.  Gejala hanya Terdapat pada Bagian Pucuk Daun. <br />

<br />
B.  Penyebab Penyakit <br />
1.  Penyebab Penyakit adalah Mosaik Tembakau (Tobacco Mosaic Virus/TMV).  <br />

<br />
C.  Pemberantasan Penyakit <br />
1.  Karena TMV sangat Mudah Ditularkan maka Pencegahan yang Paling Baik Adalah pada Proses penanaman Bibit Muda di Pesemaian Hindari Proses Penanaman di dekat Tanaman yang Terserang Oleh Virus TMV. <br />
2.  Untuk Para Petani Tidak Diperbolehkan Merekok Pada Saat Proses Penanaman Bibit Muda Tembakai di Pesemaian.<br /> 
3.  Apabila Jumlah tanaman yang Terserang Banyak Maka Tidak dianjurkan untuk Tahun Berikutnya tidak ditanami Tembakau Terlebih dahulu. <br />

</p>
<hr />

<h2>7. Penyakit Krupuk</h2>
<p>

<br />
A.  Gejala Penyakit<br />
1.  Pada Tanaman Muda Pertumbuhan Terhambat. <br />
2.  Pucuk daun Mengalami Kondisi Berkerut-kerut dan Bengkok-bengkok. <br />

<br />
B.  Penyebab Penyakit <br />
1.  Penyebab Penyakit adalah Bemisia tabaci Gennadius dan B tuberculate Bondar.  <br />

<br />
C.  Pemberantasan Penyakit <br />
1.  Untuk Menanggulangi Penyakit ini Dianjurkan untuk Mengadakan Pemberantasan Serangga dan Membasmi Gulma Di are Pembibitan di Pesemaian. <br />
2.  Membersihkan Tunggul-tunggul Tembakau. <br />
3.  Mengistirahatkan Tanah Pesemaian Selama Kurang Lebih dua Bulan.<br />

</p>
<hr />