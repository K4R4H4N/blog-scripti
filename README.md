# Açık kaynak blog scripti
Merhaba arkadaşlar, sizlere codeigniter ile yazmış olduğum blog scriptini ücretsiz olarak veriyorum :)

# Yönetim paneli özellikleri
-Yazılar Sayfası (Ekle - Düzenle - Sil)
-Kategoriler Sayfası (Ekle - Düzenle - Sil)
-Yöneticiler Sayfası (Ekle - Düzenle - Sil)
-Sayfalar Sayfası (Ekle - Düzenle - Sil)
-Yorumlar Sayfası (Düzenle - Sil)
-İletişim Mesajları Sayfası (Görüntüle - Sil)
-Genel Ayarlar (Düzenle)

# Açıklama
Kişisel blog sitesi açmak isteyenlere tamamen açık kaynak kodlu uygun bir scripttir. Anasayfa kısmında StartBootstrap tarafından ücretsiz yayınlanan "Blog Home" ve "Blog Post" kullanılmıştır. Admin paneli kısmında StartBootstrap tarafından ücretsiz yayınlanan "SB Admin" kullanılmıştır. Kullanımı son derece basit ve kolaydır. Anasayfada gösterilecek olan yazıların sayısını "Genel Ayarlar" kısmından "Anasayfada görünecek olan yazı sayısı" bölümünü doldurmaları yeterlidir.

# Yönetim paneli bilgileri (demo panel bilgileri için bu adresten iletişime geçebilirsiniz: https://desponres.github.io/iletisim)
website.com/admin
Kullanıcı adı: admin@admin.com
Şifre: 123456789
(Bu bilgileri daha sonra yönetim panelinden değiştirebilirsiniz.)

# Eklenen ve Değiştirilen Kısımlar #
--Veritabanı yapısı değiştirildi.
--Veritabanı optimizasyonu yapıldı.

# Kurulum
->application->config->config.php = bu dizindeki dosyanın içerisinde;

$config['base_url'] = 'dizin buraya';

bu alana scriptin kurulu olduğu dizini yazın.


->application->config->database.php = bu dizindeki dosyanın içerisinde;

  'hostname' => 'buraya veritabanı sunucunuzun adı',
	'username' => 'buraya veritabanı kullanıcı adınız',
	'password' => 'buraya veritabanı şifreniz',
	'database' => 'buraya veritabanı adınız',
  
  bu alanları kendinize göre doldurunuz.
  
# Kurulum Videosu #
(Kurulum adımları itiraf scripti ile aynı olduğu için ekstra olarak kurulum videosu çekmedim)
  <a href="http://www.youtube.com/watch?feature=player_embedded&v=vCHJIBJN6PY
" target="_blank"><img src="http://img.youtube.com/vi/vCHJIBJN6PY/0.jpg" 
alt="Blog Scripti Kurulumu" width="240" height="180" border="10" /></a>
  
  # Eğer kurulumda bir sorun çıkarsa veya yardımcı olabileceğim bir konu olursa bana sosyal medya adreslerimden ve https://desponres.github.io/iletisim adresinden ulaşabilirsiniz.
  
  Not: Bu script tamamen açık kaynak ve ücretsizdir. Kendinize göre düzenleyebilirsiniz.
