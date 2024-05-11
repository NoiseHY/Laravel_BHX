use bhx;

-- Tạo bảng danh mục sản phẩm
CREATE TABLE LoaiSanPham (
  MaLoai INT PRIMARY KEY AUTO_INCREMENT,
  TenLoai VARCHAR(255) NOT NULL,
  MoTa VARCHAR(255)
);


ALTER TABLE LoaiSanPham
MODIFY COLUMN MoTa TEXT;

-- Tạo bảng sản phẩm
CREATE TABLE SanPham (
  MaSP INT PRIMARY KEY AUTO_INCREMENT,
  TenSP VARCHAR(255) NOT NULL,
  MaLoai INT,
  DonGia DECIMAL(10,2) NOT NULL,
  SoLuong INT NOT NULL,
  MoTa VARCHAR(255),
  HinhAnh VARCHAR(255),
  FOREIGN KEY (MaLoai) REFERENCES LoaiSanPham(MaLoai)
);


-- ALTER TABLE SanPham
-- ADD CONSTRAINT fk_MaLoai
-- FOREIGN KEY (MaLoai)
-- REFERENCES LoaiSanPham(MaLoai)
-- ON DELETE CASCADE;


-- ALTER TABLE ChiTietSanPham
-- ADD CONSTRAINT fk_ma_sp
-- FOREIGN KEY (MaSP) REFERENCES SanPham(MaSP)
-- ON DELETE CASCADE;

ALTER TABLE SanPham
MODIFY COLUMN DonGia DECIMAL(10,0);


ALTER TABLE SanPham
MODIFY COLUMN MoTa TEXT;

ALTER TABLE SanPham
add COLUMN created_at datetime;


ALTER TABLE SanPham
add COLUMN updated_at datetime;

-- CREATE TABLE ChiTietSanPham (
--   MaChiTietSP INT PRIMARY KEY AUTO_INCREMENT,
--   MaSP INT,
--   MauSac VARCHAR(50),
--   KichThuoc VARCHAR(50),
--   XuatXu VARCHAR(100),
--   ThongTinKhac TEXT,
--   FOREIGN KEY (MaSP) REFERENCES SanPham(MaSP)
-- );


-- ALTER TABLE chitietsanpham 
-- DROP FOREIGN KEY chitietsanpham_ibfk_1;

-- ALTER TABLE chitietsanpham 
-- ADD CONSTRAINT chitietsanpham_ibfk_1 FOREIGN KEY (MaSP) 
-- REFERENCES sanpham(MaSP) 
-- ON DELETE CASCADE;

-- Tạo bảng khách hàng 
CREATE TABLE KhachHang (
  MaKH INT PRIMARY KEY AUTO_INCREMENT,
  TenKH VARCHAR(255) NOT NULL,
  DiaChi VARCHAR(255) NOT NULL,
  DienThoai VARCHAR(15) NOT NULL,
  Email VARCHAR(50) NOT NULL
);

use bhx;
ALTER TABLE KhachHang
ADD COLUMN MaNguoiDung INT,
ADD FOREIGN KEY (MaNguoiDung) REFERENCES NguoiDung(MaNguoiDung);



--
CREATE TABLE NguoiDung (
  MaNguoiDung INT PRIMARY KEY AUTO_INCREMENT,
  TenDangNhap VARCHAR(255) UNIQUE NOT NULL,
  MatKhau VARCHAR(255) NOT NULL,
  HoTen VARCHAR(255) NOT NULL,
  Email VARCHAR(50) NOT NULL,
  VaiTro INT NOT NULL,
  TrangThai INT NOT NULL,
  NgayTao DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  NgayCapNhat DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

use bhx;


ALTER TABLE NguoiDung
ADD CONSTRAINT unique_TenDangNhap UNIQUE (TenDangNhap);

ALTER TABLE NguoiDung
CHANGE COLUMN NgayTao created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
CHANGE COLUMN NgayCapNhat updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP;

ALTER TABLE NguoiDung
ADD COLUMN MaKH INT,
ADD FOREIGN KEY (MaKH) REFERENCES KhachHang(MaKH);

INSERT INTO NguoiDung (TenDangNhap, MatKhau, HoTen, Email, VaiTro, TrangThai) VALUES
  ('admin', '123456', 'Quản trị viên hệ thống', 'admin@gmail.com', 1, 1),
  ('nhanvien1', 'password1', 'Nguyễn Văn A', 'nhanvien1@gmail.com', 2, 1);
  

-- Tạo bảng đơn đặt hàng
CREATE TABLE HoaDon (
  MaHD INT PRIMARY KEY AUTO_INCREMENT,
  NgayBan DATE NOT NULL,
  MaKH INT,
  TongTien DECIMAL(10,2) NOT NULL,
  TrangThai INT,
  FOREIGN KEY (MaKH) REFERENCES KhachHang(MaKH)
);

UPDATE HoaDon
SET TongTien = TRUNCATE(TongTien, 0);

-- Tạo bảng chi tiết đơn đặt hàng
CREATE TABLE ChiTietHoaDon (
  MaChiTietHD INT PRIMARY KEY AUTO_INCREMENT,
  MaHD INT,
  MaSP INT,
  SoLuong INT NOT NULL,
  DonGia DECIMAL(10,2) NOT NULL,
  ThanhTien DECIMAL(10,2) NOT NULL,
  FOREIGN KEY (MaHD) REFERENCES HoaDon(MaHD),
  FOREIGN KEY (MaSP) REFERENCES SanPham(MaSP)
);

UPDATE ChiTietHoaDon
SET DonGia = TRUNCATE(DonGia, 0);
UPDATE ChiTietHoaDon
SET ThanhTien = TRUNCATE(THanhTien, 0);


use bhx;
ALTER TABLE ChiTietHoaDon
ADD CONSTRAINT fk_MaHD FOREIGN KEY (MaHD) REFERENCES HoaDon(MaHD) ON DELETE CASCADE;

ALTER TABLE ChiTietHoaDon
ADD CONSTRAINT fk_MaHD_new FOREIGN KEY (MaHD) REFERENCES HoaDon(MaHD) ON DELETE CASCADE;

-- DELETE FROM ChiTietHoaDon WHERE MaSP = 2;

-- DELETE FROM ChiTietHoaDon WHERE MaHD BETWEEN 15 AND 73;

-- DELETE FROM HoaDon WHERE MaHD BETWEEN 15 AND 73;


-- Thêm dữ liệu vào bảng ChiTietHoaDon
INSERT INTO ChiTietHoaDon (MaHD, MaSP, SoLuong, DonGia, ThanhTien) VALUES
(1, 1, 2, 100000, 200000), -- Chi tiết hóa đơn cho hóa đơn có mã MaHD=1, sản phẩm có mã MaSP=1, số lượng là 2, đơn giá là 100000, tổng thành tiền là 200000
(1, 2, 1, 150000, 150000), -- Chi tiết hóa đơn cho hóa đơn có mã MaHD=1, sản phẩm có mã MaSP=2, số lượng là 1, đơn giá là 150000, tổng thành tiền là 150000
(2, 3, 3, 120000, 360000); -- Chi tiết hóa đơn cho hóa đơn có mã MaHD=2, sản phẩm có mã MaSP=3, số lượng là 3, đơn giá là 120000, tổng thành tiền là 360000


drop table chitiethoadon;

-- Thêm dữ liệu vào bảng LoaiSanPham
INSERT INTO LoaiSanPham (TenLoai, MoTa) VALUES
('Thực phẩm', 'Nhu cầu thiết yếu hàng ngày'),
('Đồ dùng gia đình', 'Dụng cụ cho nhà cửa'),
('Điện máy', 'Thiết bị điện tử');

use bhx;
UPDATE LoaiSanPham 
SET TenLoai = 'Bánh bao, bánh mì, pizza'
WHERE MaLoai = 3;

UPDATE LoaiSanPham 
SET TenLoai = 'Thịt, cá, trứng, hải sản '
WHERE MaLoai = 2;

-- Thêm dữ liệu vào bảng SanPham
INSERT INTO SanPham (TenSP, MaLoai, DonGia, SoLuong, MoTa, HinhAnh) VALUES
('Gạo', 1, 25000, 100, 'Gạo ngon, dẻo thơm', 'gao.jpg'),
('Nước mắm', 1, 30000, 50, 'Nước mắm ngon, đậm đà', 'nuocmam.jpg'),
('TIVI', 3, 10000, 20, 'TIVI màn hình lớn, sắc nét', 'tivi.jpg');


UPDATE SanPham 
SET HinhAnh = NULL 
WHERE MaSP IN (1, 2, 3);


ALTER TABLE SanPham
ADD COLUMN MoTa VARCHAR(255);

UPDATE SanPham 
SET HinhAnh = 'gao.png'
WHERE MaSP = 1;

UPDATE SanPham 
SET HinhAnh = 'nuocmam.jpg'
WHERE MaSP = 2;

UPDATE SanPham 
SET TenSP = 'Bánh phô mai KCook gói 330g'
WHERE MaSP = 3;

UPDATE SanPham 
SET HinhAnh = 'Bánh phô mai KCook gói 330g.jpg'
WHERE MaSP = 3;

UPDATE SanPham 
SET DonGia = '1000'
WHERE MaSP = 3;


UPDATE SanPham
SET MoTa = 'Mô tả sản phẩm 1'
WHERE MaSP = 1;

UPDATE SanPham
SET MoTa = 'Mô tả sản phẩm 2'
WHERE MaSP = 2;

UPDATE SanPham
SET MoTa = 'Mô tả sản phẩm 3'
WHERE MaSP = 3;

UPDATE SanPham
SET MoTa = 'Mô tả sản phẩm 9'
WHERE MaSP = 9;

UPDATE SanPham
SET MoTa = 'Mô tả sản phẩm 12'
WHERE MaSP = 12;

UPDATE SanPham
SET MoTa = 'Mô tả sản phẩm 13'
WHERE MaSP = 13;

UPDATE SanPham
SET MoTa = 'Mô tả sản phẩm 14'
WHERE MaSP = 14;



-- 
INSERT INTO KhachHang (TenKH, DiaChi, DienThoai, Email) VALUES
  ('Nguyễn Văn A', 'Số 1, đường Lê Lợi, Hà Nội', '0987654321', 'nguyenvana@gmail.com'),
  ('Trần Thị B', 'Số 2, đường Nguyễn Trãi, TP.HCM', '0123456789', 'tranthib@gmail.com'),
  ('Lê Minh C', 'Số 3, đường Lý Thái Tổ, Đà Nẵng', '0345678901', 'lemnihc@gmail.com');
  
update KhachHang set 
MaNguoiDung = 4
where MaKH = 2;
--  
INSERT INTO HoaDon (NgayBan, MaKH, TongTien, TrangThai) VALUES
  ('2024-03-30', 1, 200000, 1),  -- Order from customer 1 with total 200,000 VND (pending)
  ('2024-03-30', 2, 500000, 2);  -- Order from customer 2 with total 500,000 VND (completed)
-- 
INSERT INTO HoaDon (NgayBan, MaKH, TongTien, TrangThai) VALUES
  ('2024-03-30', 2, 200000, 1);
--
INSERT INTO ChiTietHoaDon (MaHD, MaSP, SoLuong, DonGia, ThanhTien) VALUES
  (1, 1, 2, 25000, 50000),  -- 2 units of product 1 (assuming price 25,000 VND) in order 1
  (2, 2, 3, 100000, 300000); -- 3 units of product 2 (assuming price 100,000 VND) in order 2
--
INSERT INTO ChiTietHoaDon (MaHD, MaSP, SoLuong, DonGia, ThanhTien) VALUES
  (6, 1, 2, 25000, 50000);
--

use bhx;

  CREATE TABLE GioHang (
  MaGioHang INT PRIMARY KEY AUTO_INCREMENT,
  MaNguoiDung INT,
  NgayThem DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT FK_NguoiDung_GioHang FOREIGN KEY (MaNguoiDung) REFERENCES NguoiDung(MaNguoiDung)
);

CREATE TABLE ChiTietGioHang (
  MaChiTietGioHang INT PRIMARY KEY AUTO_INCREMENT,
  MaGioHang INT,
  MaSanPham INT,
  SoLuong INT NOT NULL,
  CONSTRAINT FK_GioHang_ChiTietGioHang FOREIGN KEY (MaGioHang) REFERENCES GioHang(MaGioHang),
  CONSTRAINT FK_SanPham_ChiTietGioHang FOREIGN KEY (MaSanPham) REFERENCES SanPham(MaSP)
);

ALTER TABLE ChiTietGioHang
ADD COLUMN TenSanPham VARCHAR(255) NOT NULL,
ADD COLUMN Gia DECIMAL(10,2) NOT NULL,
ADD COLUMN ThanhTien DECIMAL(10,2) NOT NULL;

ALTER TABLE ChiTietGioHang
ADD COLUMN Anh VARCHAR(255) NOT NULL;

INSERT INTO GioHang (MaNguoiDung, NgayThem) VALUES
(4, '2024-04-12 08:00:00'),
(2, '2024-04-11 14:30:00');

INSERT INTO ChiTietGioHang (MaGioHang, MaSanPham, TenSanPham, Gia, SoLuong, ThanhTien, Anh) VALUES
(1, 1, 'Sản phẩm 1', 100000, 2, 200000, 'sanpham1.jpg'),
(1, 2, 'Sản phẩm 2', 150000, 1, 150000, 'sanpham2.jpg'),
(2, 3, 'Sản phẩm 3', 200000, 3, 600000, 'sanpham3.jpg');

-- DROP TABLE ChiTietSanPham;

use bhx;
ALTER TABLE ChiTietGioHang
DROP COLUMN TenSanPham,
DROP COLUMN Gia,
DROP COLUMN Anh,
DROP COLUMN ThanhTien;


CREATE TABLE ChiTietSanPham (
  MaChiTietSP INT PRIMARY KEY AUTO_INCREMENT,
  MaSP INT,
  ThuongHieu VARCHAR(100),
  KhoiLuong VARCHAR(50),
  ThanhPhan TEXT,
  HuongDanSuDung TEXT,
  HanSuDung DATE,
  BaoQuan TEXT,
  SanXuatTai VARCHAR(100),
  FOREIGN KEY (MaSP) REFERENCES SanPham(MaSP)
);

ALTER TABLE ChiTietSanPham
MODIFY COLUMN HanSuDung TEXT;

use bhx;

ALTER TABLE ChiTietSanPham
ADD COLUMN DonVi text;


-- delete from chitietsanpham
-- where MaChiTietSP =  19;

use bhx;
ALTER TABLE ChiTietSanPham 
ADD column HinhAnh varchar(200);

USE bhx;

ALTER TABLE ChiTietSanPham 
MODIFY COLUMN HinhAnh TEXT;

USE bhx;

ALTER TABLE SanPham 
MODIFY COLUMN MoTa TEXT;

ALTER TABLE ChiTietGioHang
DROP FOREIGN KEY FK_SanPham_ChiTietGioHang;

ALTER TABLE ChiTietGioHang
ADD CONSTRAINT FK_SanPham_ChiTietGioHang
FOREIGN KEY (MaSanPham)
REFERENCES SanPham(MaSP)
ON DELETE CASCADE;



INSERT INTO ChiTietSanPham (MaSP, ThuongHieu, KhoiLuong, ThanhPhan, HuongDanSuDung, HanSuDung, BaoQuan, SanXuatTai) VALUES
(1, 'Thương hiệu A', '500g', 'Thanh phần sản phẩm 1', 'Hướng dẫn sử dụng sản phẩm 1', '2024-12-31', 'Bảo quản sản phẩm 1', 'Việt Nam'),
(2, 'Thương hiệu B', '300g', 'Thanh phần sản phẩm 2', 'Hướng dẫn sử dụng sản phẩm 2', '2025-06-30', 'Bảo quản sản phẩm 2', 'Trung Quốc'),
(3, 'Thương hiệu C', '400g', 'Thanh phần sản phẩm 3', 'Hướng dẫn sử dụng sản phẩm 3', '2023-10-15', 'Bảo quản sản phẩm 3', 'Hàn Quốc'),
(9, 'Thương hiệu D', '600g', 'Thanh phần sản phẩm 9', 'Hướng dẫn sử dụng sản phẩm 9', '2024-08-20', 'Bảo quản sản phẩm 9', 'Nhật Bản'),
(12, 'Thương hiệu E', '700g', 'Thanh phần sản phẩm 12', 'Hướng dẫn sử dụng sản phẩm 12', '2025-04-05', 'Bảo quản sản phẩm 12', 'Úc'),
(13, 'Thương hiệu F', '450g', 'Thanh phần sản phẩm 13', 'Hướng dẫn sử dụng sản phẩm 13', '2024-09-15', 'Bảo quản sản phẩm 13', 'Pháp'),
(14, 'Thương hiệu G', '550g', 'Thanh phần sản phẩm 14', 'Hướng dẫn sử dụng sản phẩm 14', '2023-12-31', 'Bảo quản sản phẩm 14', 'Đức');

use bhx;
CREATE TABLE ThongBao (
  MaThongBao INT PRIMARY KEY AUTO_INCREMENT,
  MaNguoiDung INT,
  NoiDung TEXT,
  ThoiGian TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  TrangThai INT,
  FOREIGN KEY (MaNguoiDung) REFERENCES NguoiDung(MaNguoiDung)
);

INSERT INTO ThongBao (MaNguoiDung, NoiDung, TrangThai)
VALUES
(1, 'Bạn có một thông báo mới', 1), 
(2, 'Đã cập nhật thông tin tài khoản', 1); 

INSERT INTO ThongBao (MaNguoiDung, NoiDung, TrangThai)
VALUES
(4, 'Bạn có một thông báo mới', 0);

select count(*) as aggregate from `SanPham`;

select * from `SanPham` limit 9 offset 0













