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
| `FTP_REMOTE_DIR`  | Remote path, e.g. `public_html/` or `/` |

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

- **Connection failed**: Check `FTP_SERVER`, `FTP_USERNAME`, and `FTP_PASSWORD`. Try the same values in an FTP client (e.g. FileZilla).
- **Wrong folder / 404**: Adjust `FTP_REMOTE_DIR` to the real document root (often `public_html/`).
- **SFTP**: GoDaddy may offer SFTP. This workflow uses FTP; for SFTP you’d need a different action or script.
