package util

import (
	"crypto/md5"
	"encoding/hex"
)

// ToMD5 to md5 given string.
func ToMD5(str []byte) string {
	h := md5.New()
	h.Write(str)
	return hex.EncodeToString(h.Sum(nil))
}
