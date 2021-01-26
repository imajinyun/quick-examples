package util

import (
	"gin-admin-example/global"
	"os"

	"go.uber.org/zap"
)

// PathExists determine if path is exists.
func PathExists(path string) (bool, error) {
	_, err := os.Stat(path)
	if err == nil {
		return true, nil
	}
	if os.IsNotExist(err) {
		return false, nil
	}
	return false, err
}

// CreateDir to create a directory.
func CreateDir(dirs ...string) (err error) {
	for _, v := range dirs {
		exist, err := PathExists(v)
		if err != nil {
			return err
		}
		if !exist {
			global.GAE_LOG.Debug("create directory" + v)
			if err = os.MkdirAll(v, os.ModePerm); err != nil {
				global.GAE_LOG.Error("create directory"+v, zap.Any(" error:", err))
			}
		}
	}
	return err
}
