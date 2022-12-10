Capstone Project Back-End for Dicoding

Data source from : https://github.com/tomorisakura/unofficial-masakapahariini-api

Technology using : Deploy on Heroku, Database MySQL, Framework Laravel, Cloud for Image using Cloudinary

### Endpoint Usage
---
**Base Url** : `http://api-recipee.herokuapp.com/` ### USING POSTMAN

| Endpoint | Usage | Example |
|----------|-------|---------|
| recipes | `/api/posts` | - |
| recipes limit | `/api/posts/limit/:limitsize` | `/api/posts/limit/5` |
| recipes by category | `/api/posts/category/:key` | `/api/posts/category/14 (14,24,34,54...) (+10)` |
| recipes category | `/api/categories` | - |
| recipe detail | `/api/posts/:key` | `api/posts/14 (14,24,34,54...) (+10)` |
| get all comments | `/api/comments/:key` | `/api/comments/14 (14,24,34,54...) (+10)` |
| create comments | `/api/comments` | - |
