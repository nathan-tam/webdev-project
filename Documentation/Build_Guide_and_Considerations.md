# Build Guide and Considerations

## Prerequisites
- Local web server with PHP support, such as XAMPP.
- Database, such as MySQL (provided by XAMPP).
- Modern web browser to view the site.

---

## General Build Notes
1. Ensure the web server and database software are installed and operational.
2. Configure the database to the specifications listed in the `Database_Instructions.md` file.
3. Place the site directory where the web server can access it (e.g., `htdocs` in a XAMPP setup).
4. Navigate to the site directory containing `index.php` (e.g., `http://localhost/booked/index.php`).

---

### Web Server Notes
- No extra libraries, frameworks, or other supplemental technology are required.
- **Do not alter the file structure** inside the site directory. The relative position of files is hardcoded and must be manually updated in the website code if file structure changes are required.
- All CSS styling is contained in `main-stylesheet.css`.

---

### Database Notes
- The backend expects the database to be hosted on the web server.
- The database should be configured with naming and tables detailed in the `Database_Instructions.md` file.
- `DDL.sql` and `DML.sql` are provided to assist with database recreation.
- **Do not alter the database naming or table structure.** The site is coded to expect specific database structures.
- The `connector.php` file in the `scripts` directory contains the configuration for the database connection. It is currently configured with the default settings for a XAMPP MySQL database.

---

**Jonathan Latkowcer**  
Team Leader