@echo off
echo  SELAMAT DATANG DI SISTEM BACKUP APLLICATION

echo Meminta akses...
if not "%1"=="am_admin" (powershell start -verb runas '%0' am_admin & exit)
cls
set backupDir="D:\Localhost_MySQL_Backup"
set dbUser=root
set dbPassword=""
set dbname="example_penjualan"
:: get date
for /F "tokens=2-4 delims=/ " %%i in ('date /t') do (
	set mm=%%i
	set dd=%%j
	set yy=%%k
)

if %mm%==01 set Month="Jan"
if %mm%==02 set Month="Feb"
if %mm%==03 set Month="Mar"
if %mm%==04 set Month="Apr"
if %mm%==05 set Month="May"
if %mm%==06 set Month="Jun"
if %mm%==07 set Month="Jul"
if %mm%==08 set Month="Aug"
if %mm%==09 set Month="Sep"
if %mm%==10 set Month="Oct"
if %mm%==11 set Month="Nov"
if %mm%==12 set Month="Dec"

set dirName=%dd%_%Month%_%yy%
set fileSuffix=%dd%-%Month%-%yy%

:: remove echo here if you like
echo "Membuat directory "="%dirName%"

:: switch to the "data" folder
pushd "%mysqlDataDir%"

:: create backup folder if it doesn't exist
if not exist %backupDir%\%dirName%\ mkdir %backupDir%\%dirName%
for /d %%f in (*) do (
	:: remove echo here if you like
	echo processing folder "%%f"
)
C:\xampp\mysql\bin\mysqldump --user=%dbUser% --password=%dbPassword% --result-file="%backupDir%\%dirName%\%dd%_%Month%_%yy%.sql" %dbname%

echo completed
echo output file : D:\Localhost_MySQL_Backup\%dd%_%Month%_%yy%
pause
exit