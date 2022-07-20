REM เพิ่ม path ตำแหน่งไดเร็กทรอรีของ mysql ก่อนรัน เช่น c:/xampp/mysql/bin 
mysql -u root -e "DROP DATABASE IF EXISTS 620112230039p_procument2"
mysql -u root -e "create database 620112230039p_procument2" 
mysql -u root  620112230039p_procument2 < 620112230039p_procument2.sql