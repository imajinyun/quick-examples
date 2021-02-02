package service

import (
	"gin-admin-example/global"
	"gin-admin-example/model"
)

// CreateSysOperationRecord to create a new operation record.
func CreateSysOperationRecord(sysOperationRecord model.SysOperationRecord) (err error) {
	err = global.GAE_DB.Create(&sysOperationRecord).Error
	return err
}
