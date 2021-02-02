package service

import (
	"errors"
	"gin-admin-example/global"
	"gin-admin-example/model"
	"gin-admin-example/util"

	uuid "github.com/satori/go.uuid"
	"gorm.io/gorm"
)

// Register func.
func Register(u model.SysUser) (err error, userInter model.SysUser) {
	var user model.SysUser
	if !errors.Is(global.GAE_DB.Where("username = ?", u.Username).First(&user).Error, gorm.ErrRecordNotFound) { // 判断用户名是否注册
		return errors.New("用户名已注册"), userInter
	}
	u.Password = util.ToMD5([]byte(u.Password))
	u.UUID = uuid.NewV4()
	err = global.GAE_DB.Create(&u).Error
	return err, u
}

// Login func.
func Login(u *model.SysUser) (err error, userInter *model.SysUser) {
	var user model.SysUser
	u.Password = util.ToMD5([]byte(u.Password))
	err = global.GAE_DB.Where("username = ? AND password = ?", u.Username, u.Password).Preload("Authority").First(&user).Error
	return err, &user
}
