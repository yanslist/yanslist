### **WIP**

- [x] expire date

- [ ] post validation

- [x] responsive
  - [ ] radio input display issue on mobile

- [ ] comments feature
  - [x] show comments on post
  - [x] anon can submit comment
  - [x] comments are encrypted
  - [x] only OP can read the comments by entering token
  - [ ] comment user can view own comment

- [x] token
  - [x] changed new post with token input, generated from controller, user can also change if they want
  - [x] post data submit with token
  - [x] hash the token at controller and save to db

### **TODO**

- [ ] share feature
  - [ ] to social media
  - [ ] shorten url [Polr](https://github.com/cydrobolt/polr/)
    , [laravle-url-shortener](https://github.com/LaraCrafts/laravel-url-shortener)
  - [ ] qr code [simple-qrcode](https://github.com/SimpleSoftwareIO/simple-qrcode)
    , [guide](https://kerneldev.com/qr-codes-in-laravel-complete-guide/)

- [ ] edit feature

- [x] no recaptcha on localhost

- [ ] api feature
  - [ ] check necessary attributes to hide
  - [ ] security

- [ ] auth feature

- [ ] switch to vuikit ?

- [ ] csrf ?

- [ ] admin feature
  - [Orchid Admin](https://www.notion.so/Orchid-Admin-6cf1211499b347f68dad4b00152cffe0)

- [ ] remove presenter composer package ?

- [ ] post repository, use requests feature

- [ ] translate noti text

- [ ] get() vs all()

- [ ] cron to auto update expired posts status
