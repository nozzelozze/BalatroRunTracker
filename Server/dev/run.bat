@echo off
for /f "tokens=1,2 delims==" %%A in (.env) do set %%A=%%B

"%PHP_PATH%" -S localhost:%PORT%
pause
