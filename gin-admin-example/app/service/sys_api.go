package service

import (
	"errors"
	"gin-admin-example/global"
	"gin-admin-example/model"

	"gorm.io/gorm"
)

// CreateAPI func.
func CreateAPI(api model.SysAPI) (err error) {
	if !errors.Is(global.GAE_DB.Where("path = ? AND method = ?", api.Path, api.Method).First(&model.SysAPI{}).Error, gorm.ErrRecordNotFound) {
		return errors.New("存在相同api")
	}
	return global.GAE_DB.Create(&api).Error
}
