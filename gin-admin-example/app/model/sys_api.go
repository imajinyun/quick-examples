package model

import "gin-admin-example/global"

// SysAPI struct.
type SysAPI struct {
	global.GAE_MODEL
	Path        string `json:"path" gorm:"comment:api路径"`
	Description string `json:"description" gorm:"comment:api中文描述"`
	APIGroup    string `json:"apiGroup" gorm:"comment:api组"`
	Method      string `json:"method" gorm:"default:POST" gorm:"comment:方法"`
}
