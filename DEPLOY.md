# Deploying to GoDaddy (CI/CD)

When you **merge into the `main` branch** (e.g. merge `dev` → `main`), GitHub Actions deploys the site to your GoDaddy hosting via FTP.

## One-time setup

### 1. Get FTP details from GoDaddy

1. Log in to [GoDaddy](https://www.godaddy.com) → **My Products**.
2. Open your **Web Hosting** (cPanel or similar) for the domain.
3. Find **FTP** or **FTP Accounts** and note:
   - **FTP server** (e.g. `ftp.yourdomain.com` or the hostname GoDaddy shows).
   - **Username** (e.g. `youruser@yourdomain.com` or a dedicated FTP user).
   - **Password** (for that FTP user).
4. **Remote folder**: usually your web root, e.g.:
   - `public_html/` or
   - ` /` (root) or
   - ` /home/yourusername/public_html`
   Use the path where `index.php` should live.

### 2. Add GitHub secrets

1. Open the repo on GitHub: **Settings** → **Secrets and variables** → **Actions**.
2. Click **New repository secret** and add:

| Secret name       | Value                          |
|-------------------|--------------------------------|
| `FTP_SERVER`      | Your FTP hostname              |
| `FTP_USERNAME`    | Your FTP username              |
| `FTP_PASSWORD`    | Your FTP password              |
| `FTP_REMOTE_DIR`  | **Just the web root:** `public_html/` (so files go directly inside `public_html`, not into a subfolder) |

Use the exact path GoDaddy uses for the site root (trailing slash is fine).

### 3. Deploy

- Merge your branch (e.g. `dev`) into `main`.
- Go to the repo **Actions** tab and open the latest **Deploy to GoDaddy** run to see logs and any errors.

## Deploy from a different branch

To deploy when merging into **dev** instead of **main**, edit `.github/workflows/deploy.yml` and change:

```yaml
on:
  push:
    branches:
      - dev
```

## Troubleshooting

### "The server doesn't seem to exist" / ENOTFOUND

GitHub Actions couldn’t resolve the hostname in `FTP_SERVER`. Fix it like this:

1. **Format of `FTP_SERVER`**  
   Use **only** the hostname or IP — no `ftp://`, no `https://`, no path, no trailing slash, no spaces.  
   - ✅ `ftp.thelegendofbalinesedonmu.com`  
   - ✅ `thelegendofbalinesedonmu.com`  
   - ✅ `97.74.123.45` (example IP)  
   - ❌ `ftp://ftp.thelegendofbalinesedonmu.com`  
   - ❌ `ftp.thelegendofbalinesedonmu.com/`

2. **Edit the secret**  
   Repo → **Settings** → **Secrets and variables** → **Actions** → click `FTP_SERVER` → **Update**. Paste the correct value and save.

3. **If the hostname still fails, use the server IP**  
   In GoDaddy: **Web Hosting** → **Manage** → find **Server** or **cPanel** details. Use the **shared/server IP address** as the `FTP_SERVER` secret (e.g. `97.74.xxx.xxx`). Then re-run the workflow.

4. **Try the main domain**  
   If you used `ftp.thelegendofbalinesedonmu.com`, try `thelegendofbalinesedonmu.com` as `FTP_SERVER` (some hosts don’t use an `ftp.` subdomain).

### Other issues

- **Connection failed (auth)**: Check `FTP_USERNAME` and `FTP_PASSWORD`. Test the same credentials in an FTP client (e.g. FileZilla).
- **Wrong folder / 404**: Adjust `FTP_REMOTE_DIR` to the real document root (often `public_html/`).
- **SFTP**: GoDaddy may offer SFTP. This workflow uses FTP; for SFTP you’d need a different action or script.
