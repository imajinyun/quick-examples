package service

import (
	"errors"
	"gin-admin-example/global"
	"gin-admin-example/model"
)

// FindUserByUuid func.
func FindUserByUuid(uuid string) (user *model.SysUser, err error) {
	var u model.SysUser
	if err = global.GAE_DB.Where("`uuid` = ?", uuid).First(&u).Error; err != nil {
		return &u, errors.New("用户不存在")
	}
	return &u, nil
}
